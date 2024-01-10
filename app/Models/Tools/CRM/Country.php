<?php

declare(strict_types=1);

namespace App\Models\Tools\CRM;

use App\Models\CRM\Client;
use App\Models\Tools\City;
use App\Models\Tools\Finance\Currency;
use App\Models\Tools\Finance\Tax;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
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
    ];

    // Relationships

    public function currency(): HasOne
    {
        return $this->hasOne(Currency::class);
    }

    public function taxs(): HasMany
    {
        return $this->hasMany(Tax::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
    // Helper Methods
}
