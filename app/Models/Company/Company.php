<?php

declare(strict_types=1);

namespace App\Models\Company;

use App\Enums\Company\CompanyType;
use App\Models\CRM\Client;
use App\Models\CRM\Supplier;
use App\Models\Finance\Payment\Payment;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function invoices()
    {
        return $this->through('clients')->has('invoices');
    }

    public function estimates()
    {
        return $this->through('clients')->has('estimates');
    }

    public function payments()
    {
        //return $this->through('clients')->has('payments'); // tobe tested

        return $this->hasMany(Payment::class);
    }

    // Helper Methods
}
