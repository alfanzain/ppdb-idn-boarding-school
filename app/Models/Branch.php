<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    use HasFactory;

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class)
            ->using(BranchProgram::class)
            ->withPivot('quota');
    }
}
