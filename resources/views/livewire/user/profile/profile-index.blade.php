<div>
    <h2><b>Profile</b></h2>
    <div class="card rounded-4 mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-3 mt-2">
                    <span class="border border-dark avatar avatar-xl rounded-circle" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
                </div>
                <div class="col-9 mt-2">
                    <div class="d-grid gap-2">
                        <button class="btn btn-purple rounded-4" type="button">Pick an image</button>
                        <button disabled class="btn btn-secondary rounded-4" type="button">Remove</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-3">
                <div class="row">
                    <input type="text" class="form-control rounded-3" wire:model="username">
                </div>
                <div class="row mt-2">
                    <input type="text" class="form-control rounded-3" wire:model="credential">
                </div>
            </div>
        </div>
    </div>

</div>
