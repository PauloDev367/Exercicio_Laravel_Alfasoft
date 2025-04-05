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
                            @if (auth()->user())
                                <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-info">
                                    <i class="fa-regular fa-square-plus"></i> Add new contact
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            <x-home-contacts-table :contacts="$contacts" />
                            <x-home-contacts-pagination :contacts="$contacts" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
