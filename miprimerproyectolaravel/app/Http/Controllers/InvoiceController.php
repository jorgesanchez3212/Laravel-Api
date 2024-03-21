<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceCollection;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{


    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {

        $this->$invoiceService = $invoiceService;
        
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $invoices = $this->invoiceService->getAllCustomers();
            Log::info('holahola');

            return response()->json($invoices);
        } catch (\Exception $e) {
            Log::info('holahola');

            return response()->json(['message' => 'Error retrieving invoices', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreInvoiceRequest $request) : JsonResponse
    {
        try {
            $data = $request->validated();
            $invoice = $this->invoiceService->create($data);
            return response()->json($invoice, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating invoice', 'error' => $e->getMessage()], 500);
        }
    }

  
    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        try {
            $invoice = $this->invoiceService->findById($id);
            if (!$invoice) {
                return response()->json(['message' => 'Invoice not found'], 404);
            }
            return response()->json($invoice);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving invoice', 'error' => $e->getMessage()], 500);
        }
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $invoice = $this->invoiceService->update($data, $id);
            if (!$invoice) {
                return response()->json(['message' => 'Invoice not found'], 404);
            }
            return response()->json($invoice);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating invoice', 'error' => $e->getMessage()], 500);
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $success = $this->invoiceService->delete($id);
            if (!$success) {
                return response()->json(['message' => 'Invoice not found'], 404);
            }
            return response()->json(['message' => 'Invoice deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting Invoice', 'error' => $e->getMessage()], 500);
        }
    }
}
