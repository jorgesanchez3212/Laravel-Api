<?php
namespace App\Services;


use App\Models\Users;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class UsersService 
{
    public function getAllCustomers(): Collection
    {
        return Users::all();
    }

    
    public function findById(int $id): ?Users
    {
        return Users::find($id);
    }

    public function create(array $data): Users
    {
        return Users::create($data);
    }

    public function update(array $data, int $id): ?Users
    {
        $entity = Users::find($id);
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
        $entity = Users::find($id);
        if (!$entity) {
            return false;
        }
        return $entity->delete($id);
    }
}
