<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Users;
use App\Services\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    protected $entityService;

    public function __construct(UsersService $service)
    {
        $this->entityService = $service;
    }   

    
    public function index(): JsonResponse
    {
        try {
            $entity = $this->entityService->getAllCustomers();
            Log::info('holahola');

            return response()->json($entity);
        } catch (\Exception $e) {
            Log::info('holahola');

            return response()->json(['message' => 'Error retrieving entities', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function store(StoreUsersRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $entity = $this->entityService->create($data);
            return response()->json($entity, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating entities', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function show(int $id): JsonResponse
    {
        try {
            $entity = $this->entityService->findById($id);
            if (!$entity) {
                return response()->json(['message' => 'Entity not found'], 404);
            }
            return response()->json($entity);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving entity', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function update(UpdateUsersRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            Log::info($request);
            $entity = $this->entityService->update($data, $id);
            Log::info($entity);
            if (!$entity) {
                return response()->json(['message' => 'Entities not found'], 404);
            }
            return response()->json($entity);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating customer', 'error' => $e->getMessage()], 500);
        }
    }

   
    public function destroy(int $id): JsonResponse
    {
        try {
            $success = $this->entityService->delete($id);
            if (!$success) {
                return response()->json(['message' => 'Entity not found'], 404);
            }
            return response()->json(['message' => 'Entity deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting Entity', 'error' => $e->getMessage()], 500);
        }
    }
}
