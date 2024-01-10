<?php

declare(strict_types=1);

namespace App\Models\Finance\Item;

use App\Models\Tools\Finance\Tax;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Item extends Model
{
    use GetModelByKeyName;
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',
        'designation',
        'description',
        'quantity',
        'price_unit',
        'price_ht',
        'price_remise',
        'price_tax',
        'price_ttc',
        'options',
        'is_valide',
    ];

    /**
     * @var string[]|array<int,string>
     */
    protected $casts = [
        'quantity' => 'float',
        'position' => 'integer',
        'options' => 'array',
    ];

    // Relationships
    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }
    // Helper Methods
}
