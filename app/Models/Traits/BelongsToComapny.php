<?php

namespace App\Models\Traits;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToComapny
{
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
