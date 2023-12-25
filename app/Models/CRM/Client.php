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
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use GetModelByKeyName;
    use HasFactory;
    use UuidGenerator;
    use hasAddresses;

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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function estimates()
    {
        return $this->hasMany(Etstimate::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentsItems()
    {
        //return $this->hasManyThrough(PaymentItem::class, Payment::class);

        return $this->through('payments')->has('items');
    }

    // Helper Methods
}
