<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $service
    ) {}

    public function store(CreateContactRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('home')
            ->with('success', 'Contact created successfully');
    }

    public function update(UpdateContactRequest $request, int $id)
    {
        $this->service->update($request, $id);
        return redirect()->back()
            ->with('success', 'Contact updated successfully');
    }
}
