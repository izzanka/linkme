<div class="page-center">
    <div class="container container-tight py-4">
      @if (session()->has('message'))
        @include('layouts.message')
      @endif

      <div class="card card-md rounded-4">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          <form wire:submit.prevent="store">
            <div class="mb-3">
              <label class="form-label required">Email address</label>
              <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" placeholder="your@email.com" autocomplete="off" wire:model.lazy="email">
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label required">
                Password
              </label>

                <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror"  placeholder="Your password"  autocomplete="off" wire:model.lazy="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" value="1" class="form-check-input" wire:model="remember_me"/>
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100 rounded-4"  wire:loading.attr="disabled" wire:target="store">
                <div wire:loading wire:target="store">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                </div>
                Sign in
              </button>
            </div>
          </form>
        </div>
        <div class="hr-text">or</div>
        <div class="card-body">
          <div class="row">
            <div class="col">
                <a href="#" class="btn w-100 rounded-4 btn-danger">
                 Login with Google
              </a></div>
          </div>
        </div>
      </div>
      <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="{{ route('sign-up') }}" tabindex="-1">Sign up</a>
      </div>
    </div>
  </div>
