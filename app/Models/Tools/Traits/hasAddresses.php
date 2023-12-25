<?php

namespace App\Models\Tools\Traits;

use App\Enums\CRM\Addresse\AddressType;
use App\Models\Tools\CRM\Address;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait hasAddresses
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function invoiceAddress(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')->where('type', AddressType::INVOICEING);
    }

    public function deliveryAddress(): MorphOne
    {
        return $this->hasOne(Address::class, 'addressable')->where('type', AddressType::DELIVERING);
    }
}
