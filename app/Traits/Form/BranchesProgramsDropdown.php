<?php

namespace App\Traits\Form;

use App\Models\Branch;

trait BranchesProgramsDropdown
{
    public $branches;
    public $programs;
    public $branchesPrograms;
    public $selectedBranchId = null;
    public $selectedProgramId = null;

    public function mountBranchesProgramsDropdown()
    {
        $this->branches = Branch::all();
        $this->programs = collect();
    }

    public function updatedSelectedBranchId()
    {
        $this->selectedProgramId = null;
        $this->programs = Branch::find($this->selectedBranchId)->programs ?? [];
    }

    public function updatedSelectedProgramId()
    {
        $this->programs = Branch::find($this->selectedBranchId)->programs ?? []; // Important! To update programs pivot. Need to do more research
        $this->checkBranchProgramQuota();
    }

    public function checkBranchProgramQuota()
    {
        $branch = Branch::find($this->selectedBranchId);
        $program = $branch
            ->programs()
            ->firstWhere('program_id', $this->selectedProgramId);

        if ($program->pivot->available_quota == 0) {
            $this->dispatchBrowserEvent('swalError', [
                'message' => "Kuota untuk {$program->name} di {$branch->name} sudah penuh, silahkan pilih program yang lain"
            ]);

            $this->selectedProgramId = null;
        }
    }
}
