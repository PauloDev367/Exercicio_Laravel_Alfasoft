<?php

namespace App\Services;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;

class ContactService
{
    public function store(CreateContactRequest $request)
    {
        $created = Contact::created($request->all());
        return $created;
    }

}
