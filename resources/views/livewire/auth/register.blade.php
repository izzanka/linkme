<div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                @if (session()->has('message'))
                    @include('components.layouts.message')
                @endif
                <div class="card rounded-3">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center mt-3">
                                <h4><b>Create new account</b></h4>
                            </div>
                            <form wire:submit="register" class="mt-4">
                                <div class="input-group has-validation mb-3">
                                    <div class="form-floating ms-4 me-4 @error('form.username') is-invalid @enderror">
                                        <input type="text" class="form-control @error('form.username') is-invalid @enderror" id="floatingInput1" placeholder="name" wire:model.blur="form.username">
                                        <label for="floatingInput1">Username</label>
                                    </div>
                                    @error('form.username')
                                        <div class="invalid-feedback ms-4">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group has-validation mb-3">
                                    <div class="form-floating ms-4 me-4 @error('form.email') is-invalid @enderror">
                                        <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="floatingInput2" placeholder="name@example.com" wire:model.blur="form.email">
                                        <label for="floatingInput2">Email address</label>
                                    </div>
                                    @error('form.email')
                                        <div class="invalid-feedback ms-4">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group has-validation mb-3">
                                    <div class="form-floating ms-4 me-4 @error('form.password') is-invalid @enderror">
                                        <input type="password" class="form-control @error('form.password') is-invalid @enderror" id="floatingPassword" placeholder="Password" wire:model.blur="form.password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    @error('form.password')
                                        <div class="invalid-feedback ms-4">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-4 ms-4 me-4 d-grid">
                                    <button type="submit" class="btn btn-primary rounded-4">Create new account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}" wire:navigate>Login</a>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>
