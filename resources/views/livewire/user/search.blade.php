<div>
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="input-icon">
                <input type="text" wire:model="search" class="form-control form-control rounded-4 bg-light border border-dark" placeholder="Search by username…">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                </span>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>


    <div class="mt-3">
        <div class="text-center">
            <div wire:loading wire:target="search">
                <div class="spinner-border spinner-border-sm" role="status" style="color:#E9C0E9"></div>
            </div>
        </div>

        @if (!empty($search))
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    @if($users->isEmpty())
                        <div class="card rounded-4 bg-light border border-dark mt-3">
                            <div class="card-body text-center">
                                User not found!
                            </div>
                        </div>
                    @endif

                    @foreach($users as $user)
                        <div class="card rounded-4 bg-light border border-dark mt-3">
                            <a href="" class="text-dark" style="text-decoration: none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="avatar avatar-lg rounded-circle" style="background-image: url({{ $user->getFirstMediaUrl('user','thumb') }})"></span>
                                    </div>
                                    <div class="col-10">
                                        <h2>{{ $user->username }}</h2>
                                        <h4 class="text-secondary">{{ $user->credential }}</h4>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-3">

                </div>


            </div>

        @endif
    </div>
    <hr>
</div>
