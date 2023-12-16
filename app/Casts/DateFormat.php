<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DateFormat implements CastsAttributes
{
    /**
     * @return string|void
     */
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        if ($value) {
            return Carbon::parse($value)->format(appSettings()->date_format);
        }
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {

        if ($value) {
            return Carbon::createFromFormat(appSettings()->date_format, $value)->format('Y-m-d');
        }
    }
}
