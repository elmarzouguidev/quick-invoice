<?php

declare(strict_types=1);

namespace App\Models\Finance\BaseDocument;

use App\Traits\GetModelByKeyName;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseDocument extends Model
{
    use GetModelByKeyName;
    use HasFactory;

}
