<div>
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
    </form>
</div>
