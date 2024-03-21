<?php
namespace App\Services;


use App\Models\Rol;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class RolsService 
{
    public function getAll(): Collection
    {
        return Rol::all();
    }

    
    public function findById(int $id): ?Rol
    {
        return Rol::find($id);
    }

    public function create(array $data): Rol
    {
        return Rol::create($data);
    }

    public function update(array $data, int $id): ?Rol
    {
        $entity = Rol::find($id);
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
        $entity = Rol::find($id);
        if (!$entity) {
            return false;
        }
        return $entity->delete($id);
    }
}
