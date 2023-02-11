<div>
    <div class="input-icon">
        <input type="text" wire:model="search" class="form-control form-control rounded-4 bg-light border border-dark" placeholder="Search by username…">
        <span class="input-icon-addon">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
        </span>
    </div>

    <div class="mt-3">

        <div wire:loading wire:target="search">
            <div class="spinner-border spinner-border-sm" role="status"></div>
            Searching...
        </div>

        @if (!empty($search))
            @if($users->isEmpty())
                <div class="card rounded-4 bg-light border border-dark">
                    <div class="card-body text-center">
                        User not found!
                    </div>
                </div>
            @endif

            @foreach($users as $user)
                <div class="card rounded-4 bg-light border border-dark mt-3">
                    <div class="card-body text-center">
                        <a href="" >{{ $user->username }}</a>
                    </div>
                </div>
            @endforeach

        @endif
    </div>
    <hr>
</div>
