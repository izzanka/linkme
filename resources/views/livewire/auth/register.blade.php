<div>
    @if (session()->has('message'))
        @include('components.layouts.message')
    @endif
    <form wire:submit="register">
        Username
        <input type="text" wire:model.blur="registerForm.username">
        <div>
            @error('registerForm.username')
                {{ $message }}
            @enderror
        </div>
        Email
        <input type="email" wire:model.blur="registerForm.email">
        <div>
            @error('registerForm.email')
                {{ $message }}
            @enderror
        </div>
        Password
        <input type="password" wire:model.blur="registerForm.password">
        <div>
            @error('registerForm.password')
                {{ $message }}
            @enderror
        </div>
        <br>
        <button type="submit">Register</button>
        <small>Already have an account? <a href="{{ route('login') }}">login</a></small>
    </form>
</div>
