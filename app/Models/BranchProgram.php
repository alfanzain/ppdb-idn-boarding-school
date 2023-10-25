<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BranchProgram extends Pivot
{
    protected function availableQuota(): Attribute
    {
        $programRegistrantCount = Registrant::where('branch_id', $this->branch_id)
            ->where('program_id', $this->program_id)
            ->count() ?? 0;

        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['quota'] - $programRegistrantCount,
        );
    }
}
