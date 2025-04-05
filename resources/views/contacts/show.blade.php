@extends('layouts.default')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between ">
                            <h1>Contact details</h1>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-left-long"></i> Back to home
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $contact->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ $contact->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" id="contact" class="form-control"
                                        value="{{ $contact->contact }}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-sm btn-block btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i> Update contact
                                    </button>
                                    <button class="btn btn-sm btn-block btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete contact
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
