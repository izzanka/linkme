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
                                <h4><b>Login to your account</b></h4>
                            </div>
                            <form wire:submit="login" class="mt-4">
                                <div class="input-group has-validation mb-3">
                                    <div class="form-floating ms-4 me-4 @error('form.email') is-invalid @enderror">
                                        <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" wire:model.blur="form.email">
                                        <label for="floatingInput">Email address</label>
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

                                <div class="form-check mt-4 ms-4">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" wire:model="form.remember">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Remember me on this device
                                    </label>
                                  </div>
                                <div class="mt-4 ms-4 me-4 d-grid">
                                    <button type="submit" class="btn btn-primary rounded-4">Login</button>
                                </div>
                                <div class="ms-4 me-4">
                                    <hr>
                                </div>
                                <div class="mt-2 ms-4 me-4 d-grid mb-2">
                                    <button class="btn btn-danger rounded-4">Login with google</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    Doesn't have an account yet? <a href="{{ route('register') }}" wire:navigate>Register</a>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>
