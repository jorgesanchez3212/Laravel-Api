<?php
namespace App\Services;


use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PermissionService 
{
    public function getAllCustomers(): Collection
    {
        return Permission::all();
    }

    
    public function findById(int $id): ?Permission
    {
        return Permission::find($id);
    }

    public function create(array $data): Permission
    {
        return Permission::create($data);
    }

    public function update(array $data, int $id): ?Permission
    {
        $entity = Permission::find($id);
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
        $entity = Permission::find($id);
        if (!$entity) {
            return false;
        }
        return $entity->delete($id);
    }
}
