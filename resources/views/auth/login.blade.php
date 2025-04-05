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
                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password">Passwrod:</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fa-solid fa-right-to-bracket"></i> Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
