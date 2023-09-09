<div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <livewire:user.appearance.profile/>
                <h2 class="mt-4"><b>Custom appearance</b></h2>
                <h3 class="mt-2">
                    <b>Completely customize your LinkMe profile. Change your background with colors, gradients and images. Choose a button style, change the typeface and more.</b>
                </h3>
                <h2 class="mt-4">
                    <b>Backgrounds</b>
                    <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading wire:target="background_color"></div>
                </h2>
                <div class="card rounded-4 mt-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Color</strong></label>
                            <input type="color" onclick="this.blur();" class="form-control @error('background_color') is-invalid @enderror" wire:model.live="background_color">
                            @error('background_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h2 class="mt-4">
                    <b>Buttons</b>
                    <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading wire:target="updateButton, button_color, button_font_color"></div>
                </h2>
                <div class="card rounded-4 mt-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Fill</strong></label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_fill == true && auth()->user()->appearance->button_rounded == '0' && $status != false)) border border-primary text-center @endif">
                                        <button class="btn mt-1 mb-1 ms-1 me-1 rounded-0 btn-dark btn-lg" type="button" wire:click="updateButton('fill','0')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid  @if(auth()->user()->appearance->button_fill == true && auth()->user()->appearance->button_rounded == '4' && $status != false)) border border-primary text-center @endif">
                                        <button class="btn mt-1 mb-1 ms-1 me-1 rounded-4 btn-dark btn-lg" type="button" wire:click="updateButton('fill','4')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid  @if(auth()->user()->appearance->button_fill == true && auth()->user()->appearance->button_rounded == 'pill' && $status != false)) border border-primary text-center @endif">
                                        <button class="btn mt-1 mb-1 ms-1 me-1 rounded-pill btn-dark btn-lg" type="button" wire:click="updateButton('fill','pill')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Outline</strong></label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_outline == true && auth()->user()->appearance->button_rounded == '0' && $status != false) border border-primary text-center @endif">
                                        <button class="btn mt-1 mb-1 ms-1 me-1 rounded-0 border border-dark btn-lg" type="button" wire:click="updateButton('outline','0')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_outline == true && auth()->user()->appearance->button_rounded == '4' && $status != false)) border border-primary text-center @endif">
                                        <button class="mt-1 mb-1 ms-1 me-1 btn rounded-4 border border-dark btn-lg" type="button" wire:click="updateButton('outline','4')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_outline == true && auth()->user()->appearance->button_rounded == 'pill' && $status != false)) border border-primary text-center @endif">
                                        <button class="mt-1 mb-1 ms-1 me-1 btn rounded-pill border border-dark btn-lg" type="button" wire:click="updateButton('outline','pill')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Shadow</strong></label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_shadow == 'shadow-sm' && $status != false)) border border-primary text-center @endif">
                                        <button class="mt-1 mb-1 ms-1 me-1 btn rounded-0 border border-dark btn-lg shadow-sm" type="button" wire:click="updateButton('shadow','shadow-sm')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_shadow == 'shadow' && $status != false)) border border-primary text-center @endif">
                                        <button class="mt-1 mb-1 ms-1 me-1 btn rounded-4 border border-dark btn-lg shadow" type="button" wire:click="updateButton('shadow','shadow')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid @if(auth()->user()->appearance->button_shadow == 'shadow-lg' && $status != false)) border border-primary text-center @endif">
                                        <button class="mt-1 mb-1 ms-1 me-1 btn rounded-pill border border-dark btn-lg shadow-lg" type="button" wire:click="updateButton('shadow','shadow-lg')" @if($status != true) disabled @endif>Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Button Color</strong></label>
                            <input @if($status != true) disabled @endif type="color" onclick="this.blur();" class="form-control @error('button_color') is-invalid @enderror" wire:model.live="button_color">
                            @error('button_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Button Font Color</strong></label>
                            <input @if($status != true) disabled @endif type="color" onclick="this.blur();" class="form-control @error('button_font_color') is-invalid @enderror" wire:model.live="button_font_color">
                            @error('button_font_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h2 class="mt-4">
                    <b>Fonts</b>
                    <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading wire:target="font_color"></div>
                </h2>
                <div class="card rounded-4 mt-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Color</strong></label>
                            <input type="color" onclick="this.blur();" class="form-control @error('font_color') is-invalid @enderror" wire:model.live="font_color">
                            @error('font_color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-5">
                <livewire:user.link.preview/>
            </div>
        </div>
    </div>
</div>
