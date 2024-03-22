<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Permission;
use App\Models\Rol;
use App\Models\Users;
use App\Services\UsersService;
use Illuminate\Http\Request;
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
            $entity = $this->entityService->getAll();
            return response()->json($entity);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving entities', 'error' => $e->getMessage()], 500);
        }
    }

    
    public function store(Request $request): JsonResponse
    {
        try {

            $data = $request->all(); 
            if ($request->has('permission_id')) {
                $permissionId = $request->input('permission_id');
    
                $permission = Permission::find($permissionId);
    
                if ($permission) {
                    $data['permission_id'] = $permissionId;
                } else {
                    return response()->json(['message' => 'Invalid permission ID'], 400);
                }
            }

            if ($request->has('rol_id')) {
                $rolId = $request->input('rol_id');
                $role = Rol::find($rolId);
                if ($role) {
                    $data['rol_id'] = $rolId;
                } else {
                    return response()->json(['message' => 'Invalid role ID'], 400);
                }
            }
    
    
            $entity = $this->entityService->create($data);
            return response()->json($entity);
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

    
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $data = $request->all();

            if ($request->has('permission_id')) {
                $permissionId = $request->input('permission_id');
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $data['permission_id'] = $permissionId;
                } else {
                return response()->json(['message' => 'Invalid permission ID'], 400);
                }
            }

            if ($request->has('rol_id')) {
                $rolId = $request->input('rol_id');
                $role = Rol::find($rolId);
                if ($role) {
                    $data['rol_id'] = $rolId;
                } else {
                    return response()->json(['message' => 'Invalid role ID'], 400);
                }
            }

            $entity = $this->entityService->update($data, $id); 
            if (!$entity) {
                return response()->json(['message' => 'Entity not found'], 404);
            }
                return response()->json($entity);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating entity', 'error' => $e->getMessage()], 500);
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
