<div>
    <div class="row">
        <div class="col-11">
            <input type="text" class="@error('title') is-invalid @enderror form-control form-control-flush" wire:model.blur="title">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-1">
            <livewire:user.link.status :link="$id" :key="$id" />
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-11">
            <input type="text" class="@error('url') is-invalid @enderror form-control form-control-flush" wire:model.blur="url">
            @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
