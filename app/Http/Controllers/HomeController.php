<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private readonly ContactService $service
    ) {}

    public function index()
    {
        $contacts = $this->service->getAll();

        return view('index')
            ->with('contacts', $contacts);
    }
    
    public function create()
    {
        return view('contacts.create');
    }

    public function show(int $id)
    {
        $contact = $this->service->getOne($id);

        if ($contact == null) {
            return redirect()
                ->route('home')
                ->withErrors('Contact not found!');
        }

        return view('contacts.show')
            ->with('contact', $contact);
    }
}
