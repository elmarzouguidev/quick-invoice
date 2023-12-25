<?php

declare(strict_types=1);

namespace App\Models\Tools\CRM;

use App\Enums\CRM\Addresse\AddressType;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use GetModelByKeyName;
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
        'type' => AddressType::class,
    ];

    // Relationships

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
    // Helper Methods
}
