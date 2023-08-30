<div>
    <div style="background-color: #254F1A">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-4 mb-5">
                    <div class="fw-bolder lh-1" style="font-size:90px; color:#D2E823">Everything you are. In one, simple link in bio.</div>
                    <div class="fw-bold mt-4 text-start" style="font-size:20px; color:#D2E823">
                        Join {{ $totalRegisteredUsers ?? 0 }}+ people, using LinkMe for their link in bio. One link to help you share everything you create, curate and sell from your Instagram, TikTok, Twitter, YouTube and other social media profiles.
                    </div>
                </div>
                <div class="col-6 text-center mt-4 mb-5">
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 text-center fw-bolder" style="font-size:50px">
                    The only link in bio trusted by {{ $totalRegisteredUsers ?? 0 }}+ people.
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        @if($registeredUsers)
                            @foreach($registeredUsers as $registeredUser)
                                <a href="/" class="text-decoration-none">
                                    <img loading="lazy" src="{{ $registeredUser->image }}" width="112" height="112" class="me-3" alt="image">
                                </a>
                            @endforeach
                        @endif
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
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search by username" aria-label="Recipient's username" aria-describedby="button-addon2" wire:model.live="search">
                        </div>
                    </div>
                    <div class="col-3">
                    </div>
                </div>

                <div class="mt-2 mb-4">
                    <div class="text-center mt-3">
                        <div wire:loading wire:target="search">
                            <div class="spinner-border text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
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
                                        <a href="" class="text-decoration-none">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img src="{{ $user->image }}" alt="">
                                                    </div>
                                                    <div class="col-9 mt-3">
                                                        <h3 class="text-dark">
                                                            <b>{{ $user->username }}</b><br>
                                                        </h3>
                                                        <small class="text-secondary">
                                                            " {{ $user->bio }} "
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
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
