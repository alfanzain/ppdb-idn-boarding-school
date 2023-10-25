<div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true; progress = 0;"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    class="form-group"
>
    <label>{{ $label }}</label>

    <div class="d-flex flex-column mb-2">
        <div x-show="!isUploading">
            @if ($image)
                <div>
                    <img src="{{ $image->temporaryUrl() }}" width="160" style="max-width: 160px">
                </div>
            @endif
        </div>
        <!-- Progress Bar -->
        <div x-show="isUploading">
            <div class="progress progress-xs">
                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" :style="`width: ${progress}%`">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" wire:model="{{ $model ?? 'image' }}" accept="image/*">
            <label class="custom-file-label">Pilih file</label>
        </div>
    </div>
</div>
