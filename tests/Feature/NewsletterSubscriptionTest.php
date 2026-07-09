<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NewsletterSubscriptionTest extends TestCase
{
    /**
     * Test validation requires an email and it must be a valid email format.
     */
    public function test_requires_valid_email()
    {
        $response = $this->postJson(route('newsletter.subscribe'), [
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    /**
     * Test successful subscription.
     */
    public function test_subscribes_successfully()
    {
        config([
            'services.mailchimp.key' => 'test-key-us2',
            'services.mailchimp.list_id' => 'test-list-id',
        ]);

        Http::fake([
            'https://us2.api.mailchimp.com/3.0/lists/test-list-id/members' => Http::response([
                'id' => 'some-id',
                'status' => 'subscribed',
            ], 200),
        ]);

        $response = $this->postJson(route('newsletter.subscribe'), [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!',
            ]);
    }

    /**
     * Test response when email is already subscribed.
     */
    public function test_already_subscribed_handled_gracefully()
    {
        config([
            'services.mailchimp.key' => 'test-key-us2',
            'services.mailchimp.list_id' => 'test-list-id',
        ]);

        Http::fake([
            'https://us2.api.mailchimp.com/3.0/lists/test-list-id/members' => Http::response([
                'title' => 'Member Exists',
                'status' => 400,
                'detail' => 'test@example.com is already a list member.'
            ], 400),
        ]);

        $response = $this->postJson(route('newsletter.subscribe'), [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'This email is already subscribed to our newsletter.',
            ]);
    }
}
