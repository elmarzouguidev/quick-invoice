<?php

declare(strict_types=1);

namespace App\Models\CRM;

use App\Models\Finance\Sell\Etstimate;
use App\Models\Finance\Sell\Invoice;
use App\Models\Tools\Finance\Tax;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByKeyName;


    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',

        'is_active',
        'is_valide'
    ];

    /**
     * @var string[]|array<int,string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_valide' => 'boolean',
    ];

    // Relationships


    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function estimates()
    {
        return $this->hasMany(Etstimate::class);
    }
    // Helper Methods
}
