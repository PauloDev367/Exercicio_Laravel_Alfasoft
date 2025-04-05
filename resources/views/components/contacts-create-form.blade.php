<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror"
            maxlength="9" value="{{ old('contact') }}">
        @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-block btn-info">
            <i class="fa-regular fa-square-plus"></i> Add new contact
        </button>
    </div>
</form>
