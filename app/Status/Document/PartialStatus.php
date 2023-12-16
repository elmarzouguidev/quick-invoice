<?php

namespace App\Status\Document;

class PartialStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
