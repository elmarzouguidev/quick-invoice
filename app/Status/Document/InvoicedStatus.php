<?php

namespace App\Status\Document;

class InvoicedStatus extends DocumentStatus
{
    public function canBeChanged(): bool
    {
        return true;
    }
}
