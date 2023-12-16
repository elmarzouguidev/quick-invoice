<?php

declare(strict_types=1);

namespace App\Models\Finance\Price;

use App\Casts\DateFormat;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Price extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByKeyName;


    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',
        'price_date',
        'price_ht',
        'price_total',
        'price_tax',
        'price_remise',
        'price_due',
        'is_valid',
    ];

    /**
     * @var string[]|array<int,string>
     */
    protected $casts = [

        'price_date' => DateFormat::class,

        'price_ht' => 'float',
        'price_total' => 'float',
        'price_tax' => 'float',
        'price_remise' => 'float',
        'price_due' => 'float',
        'is_valid' => 'boolean'
    ];

    // Relationships


    public function priceable(): MorphTo
    {
        return $this->morphTo();
    }


    // Helper Methods
}
