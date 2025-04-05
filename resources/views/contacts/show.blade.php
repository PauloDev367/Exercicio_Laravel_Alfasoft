@extends('layouts.default')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-alert-messages />
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between ">
                            <h1>Contact details</h1>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-left-long"></i> Back to home
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contacts.update', $contact->id) }}" id="update-form" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $contact->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $contact->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" id="contact"
                                        class="form-control @error('contact') is-invalid @enderror" maxlength="9"
                                        value="{{ old('contact', $contact->contact) }}">
                                    @error('contact')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-warning w-100 mb-2" form="update-form">
                                        <i class="fa-solid fa-pen-to-square"></i> Update contact
                                    </button>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" id="delete-form"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger w-100" form="delete-form"
                                            onclick="confirm('Are you sure?') && this.closest('form').submit()">
                                            <i class="fa-solid fa-trash"></i> Delete contact
                                        </button>
                                    </form>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
