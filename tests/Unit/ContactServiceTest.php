<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateContactRequest;
use Mockery;

class ContactServiceTest extends TestCase
{
    use RefreshDatabase;

    protected ContactService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ContactService();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    private function contactData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Lucas Costa',
            'contact' => '123456789',
            'email' => 'lucas@example.com',
        ], $overrides);
    }

    /** @test */
    public function it_finds_contact_by_id()
    {
        $contact = Contact::factory()->create();

        $found = $this->service->getOne($contact->id);

        $this->assertNotNull($found);
        $this->assertEquals($contact->id, $found->id);
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
        $data = $this->contactData();

        $contact = Contact::create($data);

        $this->assertDatabaseHas('contacts', $data);
        $this->assertEquals('Lucas Costa', $contact->name);
    }

    /** @test */
    public function it_fails_validation_when_data_is_invalid()
    {
        $request = new \App\Http\Requests\CreateContactRequest();
    
        $validator = \Validator::make([
            'name' => 'abc',
            'contact' => '123456789',
            'email' => 'invalid-email',
        ], $request->rules());
    
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('name', $validator->errors()->messages());
        $this->assertArrayHasKey('email', $validator->errors()->messages());
    }
    /** @test */
    public function it_fails_to_create_contact_with_duplicate_email_or_contact()
    {
        Contact::factory()->create($this->contactData());

        $response = $this->postJson(route('contacts.store'), $this->contactData());

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email', 'contact']);
    }

    /** @test */
    public function it_soft_deletes_a_contact()
    {
        $contact = Contact::factory()->create();

        $this->service->destroy($contact->id);

        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
        $this->assertNull(Contact::find($contact->id));
        $this->assertNotNull(Contact::withTrashed()->find($contact->id));
    }

    /** @test */
    public function it_updates_a_contact_with_valid_data()
    {
        $contact = Contact::factory()->create([
            'name' => 'João Antigo',
            'contact' => '123456789',
            'email' => 'old@example.com',
        ]);

        $newData = [
            'name' => 'João Atualizado',
            'contact' => '987654321',
            'email' => 'new@example.com',
        ];

        $request = Mockery::mock(UpdateContactRequest::class);
        $request->shouldReceive('input')->with('name')->andReturn($newData['name']);
        $request->shouldReceive('input')->with('contact')->andReturn($newData['contact']);
        $request->shouldReceive('input')->with('email')->andReturn($newData['email']);

        $updated = $this->service->update($request, $contact->id);

        $this->assertEquals($newData['name'], $updated->name);
        $this->assertEquals($newData['contact'], $updated->contact);
        $this->assertEquals($newData['email'], $updated->email);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => $newData['name'],
            'contact' => $newData['contact'],
            'email' => $newData['email'],
        ]);
    }
}
