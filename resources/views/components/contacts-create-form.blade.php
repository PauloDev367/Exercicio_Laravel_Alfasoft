<form action="{{ route('contacts.store') }}" id="create-contact-form" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" required minlength="5">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror"
            value="{{ old('contact') }}" required minlength="9" maxlength="9">
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
