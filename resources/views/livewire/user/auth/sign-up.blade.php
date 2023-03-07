<div class="page-center">
    <div class="container container-tight py-4">
        @if (session()->has('message'))
            @include('layouts.message')
        @endif
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
                        <label class="form-label required">Bio (Job / Title / Status)</label>
                        <textarea class="form-control rounded-3 @error('bio') is-invalid @enderror" placeholder="Enter bio" wire:model.lazy="bio"></textarea>
                        @error('bio')
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
                            <img class="avatar avatar-xl rounded-circle" src="{{ $image->temporaryUrl() }}" alt="preview" loading="lazy">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" wire:model.lazy="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>

                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100 rounded-4" wire:loading.attr="disabled" wire:target="image, store">
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
