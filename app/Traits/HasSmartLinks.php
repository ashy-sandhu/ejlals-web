<?php

namespace App\Traits;

trait HasSmartLinks
{
    /**
     * SEO Smart Filter: Automatically handles internal/external links and fixes protocols.
     */
    public function processLinks(?string $content): string
    {
        if (empty($content)) return '';

        $currentHost = request()->getHost();
        $mainDomain = preg_replace('/^www\./', '', $currentHost);
        
        return preg_replace_callback('/<a\s+([^>]*?)href=["\']([^"\']+)["\']([^>]*?)>/i', function($matches) use ($currentHost, $mainDomain) {
            $beforeHref = $matches[1];
            $url = $matches[2];
            $afterHref = $matches[3];
            
            // 1. Auto-fix: if link starts with www. and has no protocol, prepend https://
            if (preg_match('/^www\./i', $url)) {
                $url = 'https://' . $url;
            }

            // 2. Advanced fix: Detect broken relative links like ".../www.google.com"
            if (!preg_match('/^https?:\/\//i', $url) && preg_match('/www\./i', $url)) {
                $url = 'https://' . preg_replace('/.*?(www\..*)/i', '$1', $url);
            }
            elseif (str_contains($url, $currentHost) && preg_match('/\/www\./i', $url)) {
                $url = 'https://' . preg_replace('/.*?\/(www\..*)/i', '$1', $url);
            }

            // 3. Determine if it's internal
            $linkHost = parse_url($url, PHP_URL_HOST);
            $isInternal = false;
            
            if (!$linkHost) {
                $isInternal = true;
            } else {
                $isInternal = ($linkHost === $currentHost || 
                              $linkHost === $mainDomain || 
                              str_ends_with($linkHost, '.' . $mainDomain) ||
                              $linkHost === 'ejlals.com' ||
                              str_ends_with($linkHost, '.ejlals.com'));
            }

            // 4. Reconstruct tag
            if ($isInternal) {
                // Internal: Return with fixed URL but keep original attributes
                return '<a ' . trim($beforeHref . ' ' . $afterHref) . ' href="' . $url . '">';
            } else {
                // External: Strip existing rel/target and add ours
                $otherAttrs = preg_replace('/\b(rel|target)\s*=\s*["\'][^"\']*["\']/i', '', $beforeHref . ' ' . $afterHref);
                return '<a ' . trim($otherAttrs) . ' href="' . $url . '" rel="nofollow noopener noreferrer" target="_blank">';
            }
        }, $content);
    }
}
