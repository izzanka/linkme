<div>
    <label class="form-check form-switch">
        <input class="form-check-input" onclick="this.blur();" type="checkbox" @if($is_active) checked @endif role="switch" wire:model.live="is_active">
    </label>
</div>
