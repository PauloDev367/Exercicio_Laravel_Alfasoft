<?php

namespace Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contact;

class ContactServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_contact_with_valid_data()
    {
        $data = [
            'name' => 'Lucas Costa',
            'contact' => '123456789',
            'email' => 'lucas@example.com',
        ];

        $response = $this->postJson(route('contacts.store'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }

    /** @test */
    public function it_fails_to_create_contact_with_invalid_data()
    {
        $data = [
            'name' => 'abc',
            'contact' => '123456789',
            'email' => 'not-an-email',
        ];

        $response = $this->postJson(route('contacts.store'), $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email']);
    }

    /** @test */
    public function it_fails_with_duplicate_email_or_contact()
    {
        Contact::factory()->create([
            'contact' => '123456789',
            'email' => 'lucas@example.com',
        ]);

        $data = [
            'name' => 'Outro Nome',
            'contact' => '123456789',
            'email' => 'lucas@example.com',
        ];

        $response = $this->postJson(route('contacts.store'), $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['contact', 'email']);
    }
}
