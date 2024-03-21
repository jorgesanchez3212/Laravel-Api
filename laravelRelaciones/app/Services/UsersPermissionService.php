<?php

namespace App\Services;


use App\Models\UserPermission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class UsersPermissionService 
{
    public function getAllCustomers(): Collection
    {
        return UserPermission::all();
    }

    
    public function findById(int $id): ?UserPermission
    {
        return UserPermission::find($id);
    }

    public function create(array $data): UserPermission
    {
        return UserPermission::create($data);
    }

    public function update(array $data, int $id): ?UserPermission
    {
        $entity = UserPermission::find($id);
        if (!$entity) {
            return null;
        }
        Log::info("Soy el servicio");
        Log::info($data);
        $entity->update($data);
        return $entity;
    }


    public function delete(int $id): bool
    {
        $entity = UserPermission::find($id);
        if (!$entity) {
            return false;
        }
        return $entity->delete($id);
    }
}
