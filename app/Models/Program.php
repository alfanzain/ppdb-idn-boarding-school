<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use HasFactory;

    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class)
            ->using(BranchProgram::class)
            ->withPivot('quota');
    }
}
