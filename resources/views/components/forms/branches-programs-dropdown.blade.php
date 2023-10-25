<div x-data="{ show: @entangle('selectedBranchId') }">
    <div class="form-group">
        <label>Cabang IDN</label>
        <select name="branch_id" class="form-control" wire:model="selectedBranchId" >
            <option value="" selected>Pilih Cabang</option>
            @foreach ($branches as $branch)
                <option wire:key="branch-{{ $branch->id }}" value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>
    <div x-show="show" class="form-group">
        <label>Program IDN</label>
        <select name="program_id" class="form-control" wire:model="selectedProgramId">
            <option value="" selected>Pilih Program</option>
            @foreach ($programs as $program)
                <option wire:key="program-{{ $program->id }}" value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
    </div>
</div>
