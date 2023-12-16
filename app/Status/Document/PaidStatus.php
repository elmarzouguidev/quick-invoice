<?php

namespace App\Status\Document;

class PaidStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return false;
    }
}
