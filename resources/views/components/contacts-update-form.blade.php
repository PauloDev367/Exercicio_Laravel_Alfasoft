<form action="{{ route('contacts.update', $contact->id) }}" id="update-form" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $contact->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $contact->email) }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror"
            maxlength="9" value="{{ old('contact', $contact->contact) }}">
        @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</form>
<div class="form-group">
    <button type="submit" class="btn btn-sm btn-warning w-100 mb-2" form="update-form">
        <i class="fa-solid fa-pen-to-square"></i> Update contact
    </button>
    <x-contacts-delete-form :contact="$contact" />
</div>
