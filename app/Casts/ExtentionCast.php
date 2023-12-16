<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExtentionCast implements CastsAttributes
{
    /**
     * Cast the given value.
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): string
    {
        $fileName = substr($value, strrpos($value, '.') + 1);

        return Str::lower($fileName);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array  $value
     * @return void
     */
    public function set(Model $model, string $key, $value, array $attributes)
    {
        //return json_encode($value);
    }
}
