@extends('layouts.default')

@section('content')
    <main class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-alert-messages />
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h1>Login</h1>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-left-long"></i> Back to home
                            </a>
                        </div>
                        <div class="card-body">
                            <x-auth-login-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
