<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
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
