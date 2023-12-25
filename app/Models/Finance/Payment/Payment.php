<?php

declare(strict_types=1);

namespace App\Models\Finance\Payment;

use App\Models\CRM\Client;
use App\Models\Tools\Finance\PaymentMethod;
use App\Models\Traits\BelongsToComapny;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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

    public function paymentMathod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(PaymentItem::class);
    }

    // Helper Methods
}
