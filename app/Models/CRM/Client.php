<?php

declare(strict_types=1);

namespace App\Models\CRM;

use App\Models\Finance\Payment\Payment;
use App\Models\Finance\Sell\Etstimate;
use App\Models\Finance\Sell\Invoice;
use App\Models\Tools\City;
use App\Models\Tools\CRM\Activity;
use App\Models\Tools\CRM\Country;
use App\Models\Tools\CRM\Type;
use App\Models\Tools\Finance\Currency;
use App\Models\Tools\Finance\Tax;
use App\Models\Tools\Traits\hasAddresses;
use App\Models\Traits\BelongsToComapny;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
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

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function estimates(): HasMany
    {
        return $this->hasMany(Etstimate::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentsItems()
    {
        // return $this->hasManyThrough(PaymentItem::class, Payment::class);

        return $this->through('payments')->has('items');
    }

    // Helper Methods
}
