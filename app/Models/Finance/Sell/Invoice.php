<?php

declare(strict_types=1);

namespace App\Models\Finance\Sell;

use App\Models\CRM\Client;
use App\Models\Finance\Document\Document;
use App\Models\Finance\Item\Item;
use App\Models\Finance\Payment\PaymentItem;
use App\Models\Finance\Price\Price;
use App\Models\Traits\BelongsToComapny;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Invoice extends Model
{
    use BelongsToComapny;
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
    ];

    // Relationships

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function prices(): MorphMany
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function items(): MorphMany
    {
        return $this->morphMany(Item::class, 'itemable')->orderBy('position');
    }

    public function payments()
    {
        return $this->hasMany(PaymentItem::class);
    }

    // Helper Methods
}
