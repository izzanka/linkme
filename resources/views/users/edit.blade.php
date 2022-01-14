@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <form action="/dashboard/settings" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                    <input type="color" name="background_color" class="form-control @error('background_color') is-invalid @enderror" value="{{ $user->background_color }}">
                                    @error('background_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color">Text Color</label>
                                    <input type="color" name="text_color" class="form-control @error('text_color') is-invalid @enderror" value="{{ $user->text_color }}">
                                    @error('text_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary {{ session('success') ? 'is-valid' : '' }}">Save Setting</button>
                                @if (session('success'))
                                    <div class="valid-feedback">{{ session('success') }}</div>
                                @endif
                            </div>
                        </div>
                    </form>

                    <hr>
                    <form action="{{ route('profile.update',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <img src="{{ asset('img/' . $user->image) }}" class="img-fluid" width="150" height="150" id="preview_img">
                                    <input type="file" name="image" accept="image/*" class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary {{ session('updated_profile') ? 'is-valid' : '' }}">Save Profile</button>
                                    @if (session('updated_profile'))
                                    <div class="valid-feedback">{{ session('updated_profile') }}</div>
                                @endif
                            </div>
                        </div>
                    </form>

                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary {{ session('updated') ? 'is-valid' : '' }}">Save Password</button>
                                            @if (session('updated'))
                                <div class="valid-feedback">{{ session('updated') }}</div>
                            @endif
                        </div>
                    </div>
                
                </div>

            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event){
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>