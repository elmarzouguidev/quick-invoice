<?php

declare(strict_types=1);

namespace App\Models\Tools\CRM;

use App\Models\CRM\Client;
use App\Traits\GetModelByKeyName;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByKeyName;


    /**
     * @var string[]|array<int,string>
     */
    protected $fillable = [
        'uuid',
        'name',
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


    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    // Helper Methods
}
