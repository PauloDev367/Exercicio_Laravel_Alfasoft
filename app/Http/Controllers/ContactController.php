<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use App\Http\Requests\CreateContactRequest;

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
}
