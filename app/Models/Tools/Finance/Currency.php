<?php

declare(strict_types=1);

namespace App\Models\Tools\Finance;

use App\Models\CRM\Client;
use App\Models\Finance\Payment\Payment;
use App\Models\Tools\CRM\Country;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use GetModelByKeyName;
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'country_id',
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

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Client::class);
    }

    // Helper Methods
}
