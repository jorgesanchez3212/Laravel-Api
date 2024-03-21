<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceService {
    public function getAllInvoices(): Collection {
        return Invoice::all();
    }

    public function findById(int $id): ?Invoice {
        return Invoice::find($id);
    } 

    public function create(array $invoiceData): Invoice {
        return Invoice::create($invoiceData);
    }

    public function update(array $invoiceData, int $id): bool {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return false;
        }
        return $invoice->update($invoiceData);
    }

    public function delete(int $id): bool {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return false;
        }
        return $invoice->delete();
    }
}
