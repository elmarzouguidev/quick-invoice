<?php

namespace App\Status\Document;

class DraftStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
