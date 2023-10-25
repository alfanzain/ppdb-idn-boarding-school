<div class="form-group">
    <label>{{ $label }}</label>
    <input wire:model.lazy="{{ $model ?? 'password' }}" name="{{ $name ?? 'password' }}" type="password" class="form-control" placeholder="{{ $placeholder ?? 'Type here' }}" autocomplete="off">
    @isset ($info)
        <small>{{ $info }}</small>
    @endif
</div>
