@extends('layouts.default')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between ">
                            <h1>Add new contact</h1>
                            <a href="{{route('home')}}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-left-long"></i> Back to home
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact:</label>
                                    <input type="text" name="contact" id="contact" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-sm btn-block btn-info">
                                        <i class="fa-regular fa-square-plus"></i> Add new contact
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
