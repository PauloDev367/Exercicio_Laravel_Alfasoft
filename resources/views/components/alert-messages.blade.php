@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->all()[0] }}
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
