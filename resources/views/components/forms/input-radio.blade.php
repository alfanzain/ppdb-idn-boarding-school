<div class="form-group">
    <label>{{ $label }}</label>
    @foreach ($items as $key => $item)
        <div class="form-check">
            <input wire:model="{{ $model ?? 'radio' }}" wire:key="gender-{{ $key }}" id="gender-{{ $key }}" class="form-check-input" type="radio" value="{{ $item->value ?? $key }}">
            <label class="form-check-label" for="gender-{{ $key }}">{{ $item->label ?? 'Radio Label' }}</label>
        </div>
    @endforeach
</div>
