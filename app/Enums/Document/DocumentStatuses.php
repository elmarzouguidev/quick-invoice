<?php

namespace App\Enums\Document;

use App\Models\Finance\Sell\Invoice;
use App\Status\Document\DocumentStatus;
use App\Status\Document\DraftStatus;
use App\Status\Document\InvoicedStatus;
use App\Status\Document\NotPaidStatus;
use App\Status\Document\PaidStatus;
use App\Status\Document\PartialStatus;
use App\Status\Document\RefuseStatus;
use App\Status\Document\ValidStatus;

enum DocumentStatuses: int
{
    case DRAFT = 0;
    case VALID = 1;
    case NOTPAID = 2;
    case PARTIEL = 3;
    case PAID = 4;
    case REFUSED = 5;
    case INVOICED = 6;

    public function createDocumentStatus(Invoice $invoice): DocumentStatus
    {
        return match ($this) {
            DocumentStatuses::DRAFT => new DraftStatus($invoice),
            DocumentStatuses::PAID => new PaidStatus($invoice),
            DocumentStatuses::NOTPAID => new NotPaidStatus($invoice),
            DocumentStatuses::PARTIEL => new PartialStatus($invoice),
            DocumentStatuses::VALID => new ValidStatus($invoice),
            DocumentStatuses::REFUSED => new RefuseStatus($invoice),
            DocumentStatuses::INVOICED => new InvoicedStatus($invoice),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            DocumentStatuses::DRAFT => 'bg-secondary',
            DocumentStatuses::PAID => 'bg-success',
            DocumentStatuses::NOTPAID => 'bg-danger',
            DocumentStatuses::PARTIEL => 'bg-warning',
            DocumentStatuses::VALID => 'bg-info',
            DocumentStatuses::REFUSED => 'bg-warning',
            DocumentStatuses::INVOICED => 'bg-success'
        };
    }

    public function getName(): string
    {
        return match ($this) {
            DocumentStatuses::DRAFT => 'Brouillon',
            DocumentStatuses::PAID => 'Payée',
            DocumentStatuses::NOTPAID => 'à régler',
            DocumentStatuses::PARTIEL => 'Partiel',
            DocumentStatuses::VALID => 'Validée',
            DocumentStatuses::REFUSED => 'Refusé',
            DocumentStatuses::INVOICED => 'Facturé'
        };
    }
}
