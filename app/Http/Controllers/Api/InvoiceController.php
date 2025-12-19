<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(
        private \App\Repositories\Contracts\InvoiceRepositoryInterface $invoices
    ) {}

    public function store(
        \App\Http\Requests\Invoice\StoreInvoiceRequest $request
    ) {
        $invoice = $this->invoices->create($request->validated());

        return new \App\Http\Resources\InvoiceResource($invoice);
    }
}

