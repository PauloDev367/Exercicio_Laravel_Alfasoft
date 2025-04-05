<form method="POST" id="auth-login" action="{{ route('login.submit') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email:</label>
        <input 
            type="email" 
            class="form-control @error('email') is-invalid @enderror" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autofocus
        >
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input 
            type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            name="password" 
            required
        >
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success btn-block">
        <i class="fa-solid fa-right-to-bracket"></i> Login
    </button>
</form>
