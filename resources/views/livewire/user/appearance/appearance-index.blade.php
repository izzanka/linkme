<div>
    <h2 class="mt-4"><b>Backgrounds</b></h2>
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

    <h2 class="mt-4"><b>Buttons</b></h2>
    <div class="card rounded-4 mt-3">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Fill</label>
                <div class="row">
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-2 btn-dark btn-lg" type="button"></button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-3 btn-dark btn-lg" type="button"></button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-4 btn-dark btn-lg" type="button"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Outline</label>
                <div class="row">
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-2 border border-dark btn-lg" type="button"></button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-3 border border-dark btn-lg" type="butto"></button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid">
                            <button class="btn rounded-4 border border-dark btn-lg" type="button"></button>
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

    <h2 class="mt-4"><b>Fonts</b></h2>
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
