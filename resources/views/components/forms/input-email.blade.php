<div class="form-group">
    <label>{{ $label }}</label>
    <input wire:model.lazy="{{ $model ?? 'email' }}" name="{{ $name ?? 'email' }}" type="email" class="form-control" placeholder="{{ $placeholder ?? 'Type here' }}" autocomplete="off">
</div>
