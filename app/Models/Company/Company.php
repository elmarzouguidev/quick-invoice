<?php

declare(strict_types=1);

namespace App\Models\Company;

use App\Enums\Company\CompanyType;
use App\Models\CRM\Client;
use App\Models\CRM\Supplier;
use App\Models\Finance\Payment\Payment;
use App\Models\User;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Company extends Model
{
    use GetModelByKeyName;
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',

        'user_id',
        'is_active',
        'is_valide',
    ];

    /**
     * @var string[]|array<int,string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_valide' => 'boolean',
        'type' => CompanyType::class,
    ];

    // Relationships

    public function group(): BelongsTo
    {
        return $this->belongsTo(CompanyGroup::class, 'company_group_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }

    public function invoices(): HasManyThrough
    {
        return $this->through('clients')->has('invoices');
    }

    public function estimates(): HasManyThrough
    {
        return $this->through('clients')->has('estimates');
    }

    public function payments(): HasMany
    {
        // return $this->through('clients')->has('payments'); // tobe tested

        return $this->hasMany(Payment::class);
    }

    // Helper Methods
}
