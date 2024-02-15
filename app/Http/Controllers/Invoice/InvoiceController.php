<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Finance\Sell\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $invoices = Invoice::all();

        return view('Invoice.index', compact('invoices'));
    }
}
