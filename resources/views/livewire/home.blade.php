<div>
    <div style="background-color: #254F1A">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-4">
                    <div class="fw-bolder lh-1" style="font-size:90px; color:#D2E823">Everything you are. In one, simple link in bio.</div>
                    <div class="fw-bold mt-4 text-start" style="font-size:20px; color:#D2E823">
                        Join {{ $totalRegisteredUser }}+ people, using LinkMe for their link in bio. One link to help you share everything you create, curate and sell from your Instagram, TikTok, Twitter, YouTube and other social media profiles.
                    </div>
                </div>
                <div class="col-6 mt-4 text-center mb-4">
                    <img loading="lazy" src="" class="rounded-4 bg-light border border-dark" alt="preview" style="height: 600px">
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 text-center fw-bolder" style="font-size:50px">
                    The only link in bio trusted by {{ $totalRegisteredUser }}+ people.
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        @foreach ($registeredUsers as $user)
                            <a target="_blank" href="">
                                <img loading="lazy" class="avatar avatar-xl rounded-circle me-2" src="{{ $user->image }}" alt="profile-image">
                            </a>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #502274" class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center fw-bolder mt-4" style="font-size:50px; color:#E9C0E9">
                    Jumpstart your corner of the internet today.
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-icon">
                            <input type="text" value="" class="form-control form-control-rounded" placeholder="Search by username…" wire:model.live="search"/>
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                 </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
                <div class="mt-2 mb-4">
                    <div class="text-center mt-3">
                        <div wire:loading wire:target="search">
                            <div class="spinner-border text-white"></div>
                        </div>
                    </div>
                    @if (!empty($search))
                        <div class="row">
                            @if($users->isEmpty())
                                <div class="text-white text-center">
                                    User not found!
                                </div>
                            @endif
                            @foreach($users as $user)
                                <div class="col-6">
                                    <div class="card rounded-4 mt-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img loading="lazy" class="avatar avatar-lg rounded-circle" src="{{ $user->image }}" alt="user-image">
                                                </div>
                                                <div class="col-9 mt-3">
                                                    <h2 class="text-dark">
                                                        <b>{{ $user->username }}</b><br>
                                                    </h2>
                                                    <h4 class="text-secondary">
                                                        "{{ $user->bio }}"
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
