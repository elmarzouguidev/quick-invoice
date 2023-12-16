<?php

namespace App\Status\Document;

class RefuseStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
