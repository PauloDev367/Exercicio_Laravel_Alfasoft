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
    public function show()
    {
        return view('contacts.show');
    }
}
