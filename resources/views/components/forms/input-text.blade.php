<div class="form-group">
    <label>{{ $label }}</label>
    <input wire:model.lazy="{{ $model ?? 'text' }}" type="text" class="form-control" placeholder="{{ $placeholder ?? 'Type here' }}">
</div>
