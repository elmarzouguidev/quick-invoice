<?php

namespace App\Status\Document;

class NotPaidStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
