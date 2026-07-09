<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    /**
     * Handle the newsletter subscription request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $apiKey = config('services.mailchimp.key');
        $listId = config('services.mailchimp.list_id');

        if (!$apiKey || !$listId) {
            Log::error('Mailchimp API Key or List ID is not configured.');
            return response()->json([
                'success' => false,
                'message' => 'Newsletter subscription is currently unavailable. Please try again later.'
            ], 503);
        }

        // Extract datacenter from API key (e.g. us2 from xxxx-us2)
        $parts = explode('-', $apiKey);
        $server = end($parts);

        if (!$server || count($parts) < 2) {
            Log::error('Invalid Mailchimp API Key format.');
            return response()->json([
                'success' => false,
                'message' => 'Newsletter subscription configuration error.'
            ], 500);
        }

        $url = "https://{$server}.api.mailchimp.com/3.0/lists/{$listId}/members";

        try {
            $response = Http::when(app()->environment('local'), function ($request) {
                    return $request->withoutVerifying();
                })
                ->withBasicAuth('anystring', $apiKey)
                ->post($url, [
                    'email_address' => $request->email,
                    'status' => 'subscribed',
                ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for subscribing to our newsletter!'
                ]);
            }

            $errorData = $response->json();

            // Handle the case where the email is already subscribed
            if (isset($errorData['title']) && $errorData['title'] === 'Member Exists') {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already subscribed to our newsletter.'
                ], 422);
            }

            // Handle other potential API errors (invalid email, etc.)
            Log::warning('Mailchimp API returned error: ' . $response->body());
            
            $detailMessage = $errorData['detail'] ?? 'Something went wrong. Please try again later.';
            return response()->json([
                'success' => false,
                'message' => $detailMessage
            ], 400);

        } catch (\Exception $e) {
            Log::error('Mailchimp subscription exception: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your subscription. Please try again.'
            ], 500);
        }
    }
}
