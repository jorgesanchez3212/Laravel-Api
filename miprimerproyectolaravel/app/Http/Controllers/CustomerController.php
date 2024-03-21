<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use App\Services\CustomerService as CustomerService;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }   

    
    public function index(): JsonResponse
    {
        try {
            $customers = $this->customerService->getAllCustomers();
            Log::info('holahola');

            return response()->json($customers);
        } catch (\Exception $e) {
            Log::info('holahola');

            return response()->json(['message' => 'Error retrieving customers', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $customer = $this->customerService->create($data);
            return response()->json($customer, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating customer', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function show(int $id): JsonResponse
    {
        try {
            $customer = $this->customerService->findById($id);
            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }
            return response()->json($customer);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving customer', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function update(UpdateCustomerRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            Log::info($request);
            $customer = $this->customerService->update($data, $id);
            Log::info($customer);
            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }
            return response()->json($customer);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating customer', 'error' => $e->getMessage()], 500);
        }
    }

   
    public function destroy(int $id): JsonResponse
    {
        try {
            $success = $this->customerService->delete($id);
            if (!$success) {
                return response()->json(['message' => 'Customer not found'], 404);
            }
            return response()->json(['message' => 'Customer deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting customer', 'error' => $e->getMessage()], 500);
        }
    }
}
