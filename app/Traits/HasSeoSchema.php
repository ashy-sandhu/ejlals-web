<?php

namespace App\Traits;

trait HasSeoSchema
{
    /**
     * Professional Organization Schema (Global for Ejlals Academy)
     */
    public static function getOrganizationSchema(): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "Ejlals Academy",
            "url" => url('/'),
            "logo" => asset('storage/ejlals-horizontal-v1.svg'),
            "sameAs" => [
                "https://facebook.com/ejlals",
                "https://twitter.com/ejlals",
                "https://instagram.com/ejlals"
            ]
        ];
    }

    /**
     * Render the JSON-LD script for any schema array.
     */
    public static function renderJsonLd(array $data): string
    {
        if (empty($data)) return '';
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    }

    /**
     * Generate professional BreadcrumbList schema.
     */
    public static function generateBreadcrumbs(array $items): array
    {
        $listItems = [];
        // Add Home as first item
        $fullItems = array_merge([['name' => 'Home', 'url' => url('/')]], $items);

        foreach ($fullItems as $index => $item) {
            $listItems[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "name" => $item['name'],
                "item" => $item['url']
            ];
        }

        return [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $listItems
        ];
    }
}
