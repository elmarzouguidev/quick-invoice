<?php

namespace App\Casts;

use App\Models\Utilities\Email as EmailModel;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Email implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): EmailModel
    {
        return new EmailModel(
            $attributes['email'],
        );
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (! $value instanceof EmailModel) {
            throw new InvalidArgumentException('The given value is not an Email instance.');
        }

        return [
            'email' => $value->firstEmail,

        ];
    }
}
