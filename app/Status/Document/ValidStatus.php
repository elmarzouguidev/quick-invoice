<?php

namespace App\Status\Document;

class ValidStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
