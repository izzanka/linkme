<div class="page-center">
    <div class="container container-tight py-4">
      <div class="card card-md rounded-4">
            <div class="card-body">
                <h2 class="text-center mb-4">Create new account</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                      <label class="form-label required">Username</label>
                      <input type="text" class="form-control rounded-3 @error('username') is-invalid @enderror" placeholder="Enter username" wire:model.lazy="username">
                      @error('username')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label required">Email address</label>
                      <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" placeholder="Enter email" wire:model.lazy="email">
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Password</label>
                        <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror"  placeholder="Enter password"  autocomplete="off" wire:model.lazy="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label class="form-label required">Credential (Job / Title / Status)</label>
                        <input type="text" class="form-control rounded-3 @error('credential') is-invalid @enderror" placeholder="Enter credential" wire:model.lazy="credential">
                        @error('credential')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div wire:loading wire:target="image">
                        <div class="mb-3">
                            <div class="spinner-border spinner-border-sm" role="status"></div>
                            Uploading image...
                        </div>
                    </div>

                    @if ($image)
                        <div class="mb-3 text-center">
                            <span class="avatar avatar-xl rounded-circle border border-dark" style="background-image: url({{ $image->temporaryUrl() }})"></span>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label required">Profile Image</label>
                        <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" wire:model.lazy="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100 rounded-4">
                            <div wire:loading wire:target="store">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                            </div>
                            Create new account
                        </button>
                    </div>
                </form>
            </div>
      </div>

      <div class="text-center text-muted mt-3">
        Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
      </div>
    </div>
  </div>
