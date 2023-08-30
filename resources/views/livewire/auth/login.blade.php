<div>
    @if (session()->has('message'))
        @include('components.layouts.message')
    @endif
    <form wire:submit="login">
        Email
        <input type="email" wire:model.blur="loginForm.email">
        <div>
            @error('loginForm.email')
                {{ $message }}
            @enderror
        </div>
        Password
        <input type="password" wire:model.blur="loginForm.password">
        <div>
            @error('loginForm.password')
                {{ $message }}
            @enderror
        </div>
        Remember me
        <input type="checkbox" wire:model="loginForm.remember">
        <br>
        <button type="submit">Login</button>
        <small>Doesn't have an account? <a href="{{ route('register') }}">register</a></small>
    </form>
</div>
