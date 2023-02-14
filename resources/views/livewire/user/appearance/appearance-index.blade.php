<div>
    <h2 class="mt-4"><b>Backgrounds</b>
        <div wire:loading wire:target="background_color">
            <span class="spinner-border spinner-border-sm ml-2" role="status"></span>
        </div>
    </h2>
    <div class="card rounded-4 mt-3">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="color" class="form-control @error('background_color') is-invalid @enderror" wire:model="background_color">
                @error('background_color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <h2 class="mt-4"><b>Buttons</b>
        <div wire:loading wire:target="updateButton, button_color, button_font_color">
            <span class="spinner-border spinner-border-sm ml-2" role="status"></span>
        </div>
    </h2>
    <div class="card rounded-4 mt-3">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Fill</label>
                <div class="row">
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-0 btn-dark btn-lg" type="button" wire:click="updateButton('fill','0')">Button</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-4 btn-dark btn-lg" type="button" wire:click="updateButton('fill','4')">Button</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-pill btn-dark btn-lg" type="button" wire:click="updateButton('fill','pill')">Button</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Outline</label>
                <div class="row">
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-0 border border-dark btn-lg" type="button" wire:click="updateButton('outline','0')">Button</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-4 border border-dark btn-lg" type="button" wire:click="updateButton('outline','4')">Button</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-pill border border-dark btn-lg" type="button" wire:click="updateButton('outline','pill')">Button</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Button color</label>
                <input type="color" class="form-control @error('button_color') is-invalid @enderror" wire:model="button_color">
                @error('button_color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Button font color</label>
                <input type="color" class="form-control @error('button_font_color') is-invalid @enderror" wire:model="button_font_color">
                @error('button_font_color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <h2 class="mt-4"><b>Fonts</b>
        <div wire:loading wire:target="font_color">
            <span class="spinner-border spinner-border-sm ml-2" role="status"></span>
        </div>
    </h2>
    <div class="card rounded-4 mt-3">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="color" class="form-control @error('font_color') is-invalid @enderror" wire:model="font_color">
                @error('font_color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
