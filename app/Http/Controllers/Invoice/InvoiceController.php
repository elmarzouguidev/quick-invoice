<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Finance\Sell\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    /*public function __invoke(Request $request)
    {
        $invoices = Invoice::all();

        return view('Invoice.index', compact('invoices'));
    }*/

    public function __invoke(User $user)
    {
        return Inertia::render('User/Show', [
            'user' => $user
        ]);
    }
}
