<?php

namespace Unit;

use Tests\TestCase;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactServiceTest extends TestCase
{
    use RefreshDatabase;
    protected ContactService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ContactService();
    }

    /** @test */
    public function it_returns_a_contact_by_id()
    {
        $contact = Contact::factory()->create();

        $found = $this->service->getOne($contact->id);

        $this->assertNotNull($found);
        $this->assertEquals($contact->id, $found->id);
        $this->assertEquals($contact->name, $found->name);
        $this->assertEquals($contact->email, $found->email);
        $this->assertEquals($contact->contact, $found->contact);
    }

    /** @test */
    public function it_returns_paginated_contacts()
    {
        Contact::factory()->count(20)->create();

        $result = $this->service->getAll();

        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $result);
        $this->assertCount(15, $result);
        $this->assertEquals(20, $result->total());
    }

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

    /** @test */
    public function it_soft_deletes_a_contact()
    {
        $contact = Contact::factory()->create();

        $this->service->destroy($contact->id);

        $this->assertSoftDeleted('contacts', [
            'id' => $contact->id,
        ]);

        $this->assertNull(Contact::find($contact->id));

        $this->assertNotNull(Contact::withTrashed()->find($contact->id));
    }

    /** @test */
    public function it_updates_a_contact_with_valid_data()
    {
        $contact = \App\Models\Contact::factory()->create([
            'name' => 'João Antigo',
            'contact' => '123456789',
            'email' => 'old@example.com',
        ]);

        $data = [
            'name' => 'João Atualizado',
            'contact' => '987654321',
            'email' => 'new@example.com',
        ];

        $request = \Mockery::mock(\App\Http\Requests\UpdateContactRequest::class);
        $request->shouldReceive('input')->with('name')->andReturn($data['name']);
        $request->shouldReceive('input')->with('contact')->andReturn($data['contact']);
        $request->shouldReceive('input')->with('email')->andReturn($data['email']);

        $updated = $this->service->update($request, $contact->id);

        $this->assertEquals($data['name'], $updated->name);
        $this->assertEquals($data['contact'], $updated->contact);
        $this->assertEquals($data['email'], $updated->email);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => $data['name'],
            'contact' => $data['contact'],
            'email' => $data['email'],
        ]);
    }
}
