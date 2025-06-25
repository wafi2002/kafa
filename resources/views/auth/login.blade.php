@extends('layouts.app')

<x-auth-card title="Welcome Back">
    @if (session('status'))
    <div class="alert alert-success d-flex justify-content-center" style="width: 600px;" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="py-3 px-3">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus id="email">
            <label for="email">Email Address</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" id="password">
            <label for="password">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <select class="form-select @error('role') is-invalid @enderror" name="role" id="role"
                aria-label="Floating label select example" required>
                <option value="Teacher" {{ old('role') == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="Parent" {{ old('role') == 'Parent' ? 'selected' : '' }}>Parent</option>
                <option value="Kafa" {{ old('role') == 'Kafa' ? 'selected' : '' }}>KAFA Admin</option>
                <option value="Muip" {{ old('role') == 'Muip' ? 'selected' : '' }}>MUIP Admin</option>
            </select>
            <label for="role">Role</label>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col d-flex justify-content-between align-items-center px-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="font-family: 'Poppins', sans-serif;">
                            Remember Me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" style="font-family: 'Poppins', sans-serif; font-weight: 400;" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button id="submit-button" type="submit" class="login-button my-3 align-self-center">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        @if (Route::has('register'))
        <div class="container d-flex align-items-center justify-content-center mt-3">
            <span class="no-account-text mr-2 fw-500">Don't have an account?</span>
            <a href="{{ route('register') }}" class="btn btn-link">
                Sign up
            </a>
        </div>
        @endif
    </form>
</x-auth-card>

@push('scripts')
<!-- Sweet alert feedback -->
@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berjaya!',
        text: "{{ session('success') }}",
    });
</script>
@endif

<!-- Dropdown role -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownButton = document.getElementById('dropdownMenuButton1');
        const roleInput = document.getElementById('role');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const value = this.getAttribute('data-value');
                const text = this.textContent;

                dropdownButton.textContent = text;
                roleInput.value = value;
            });
        });
    });
</script>
@endpush
@endsection