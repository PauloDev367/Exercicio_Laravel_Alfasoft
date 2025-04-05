<?php

namespace App\Services;

use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactService
{
    public function store(CreateContactRequest $request)
    {
        $created = Contact::created($request->all());
        return $created;
    }

    public function getOne(int $id)
    {
        return Contact::find($id);
    }

    public function getAll()
    {
        $perPage = 15;
        return Contact::paginate($perPage);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }

    public function update(UpdateContactRequest $request, int $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'name' => $request->input('name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
        ]);

        return $contact;
    }
}
