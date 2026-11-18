<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_message_is_stored_and_redirects_with_success(): void
    {
        $payload = [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Diskusi prototipe AR',
            'message' => 'Saya ingin berdiskusi mengenai prototipe AR untuk pelatihan operator.',
        ];

        $response = $this->post('/contact', $payload);

        $response
            ->assertRedirect(route('contact.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseCount('contact_messages', 1);
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Diskusi prototipe AR',
        ]);

        $this->assertNotNull(ContactMessage::query()->first()->ip_address);
    }

    public function test_required_fields_are_validated(): void
    {
        $response = $this->from('/contact')->post('/contact', []);

        $response
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_invalid_email_and_short_message_are_rejected(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => 'A',
            'email' => 'bukan-email',
            'subject' => 'Hi',
            'message' => 'Pendek',
        ]);

        $response
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_old_input_is_flashed_back_on_validation_error(): void
    {
        $this->from('/contact')->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Subjek valid',
            'message' => 'Pendek',
        ])->assertSessionHasInput('name', 'Budi Santoso');
    }
}
