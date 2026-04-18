<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register – Pets</title>
    <link rel="stylesheet" href="{{ asset('css/styleAuth.css') }}">
</head>
<body>

<div class="register-container wide">

    <h2>Create Account</h2>
    <p class="subtitle">Join the Pets family 🐾</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        {{-- Row 1 : First name / Last name --}}
        <div class="form-row">
            <div class="mb-3">
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full Name"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="mb-3">
                <input
                    type="tel"
                    name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Phone (optional)"
                    value="{{ old('phone') }}"
                >
                @error('phone')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <select name="role" class="form-control">
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="mb-3">
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password"
                    required
                >
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm password"
                    required
                >
            </div>
        </div>
        {{-- Full-width : Submit --}}
        <button type="submit" class="btn btn-primary">Create Account</button>

        <a href="{{ route('login') }}" class="signin">Already have an account? Sign In</a>
    </form>

</div>

</body>
</html>
