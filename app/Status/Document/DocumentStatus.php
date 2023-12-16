<?php

namespace App\Status\Document;

use App\Models\Finance\BaseDocument;

abstract class DocumentStatus
{
    public function __construct(protected BaseDocument $document)
    {
    }

    abstract public function canBeChanged(): bool;
}
