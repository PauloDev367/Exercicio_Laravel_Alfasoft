@extends('layouts.default')


@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-alert-messages />
                    <div class="card">

                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h1>Contacts</h1>
                            <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-info">
                                <i class="fa-regular fa-square-plus"></i> Add new contact
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>E-mail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->contact }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                <div class="pagination-area">
                                    {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
