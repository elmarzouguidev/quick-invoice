<?php

declare(strict_types=1);

namespace App\Models\CRM;

use App\Models\Tools\Traits\hasAddresses;
use App\Models\Traits\BelongsToComapny;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use BelongsToComapny;
    use GetModelByKeyName;
    use hasAddresses;
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',

        'is_active',
        'is_valide',
    ];

    /**
     * @var string[]|array<int,string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_valide' => 'boolean',
    ];

    // Relationships

    // Helper Methods
}
