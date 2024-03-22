<?php
namespace App\Services;


use App\Models\Users;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class UsersService 
{
    public function getAll(): Collection
    {
        return Users::all();
    }

    
    public function findById(int $id): ?Users
    {
        return Users::find($id);
    }

    public function create(array $data): Users
    {
    
    $permissionId = isset($data['permission_id']) ? $data['permission_id'] : null;
    unset($data['permission_id']);
    
    $u = new Users();
    $u->name = "jorge";
    $u->save();


    $user = Users::create($data);
    if ($permissionId) {
        $user->usersPermission()->create(['permission_id' => $permissionId]);
    }
    return $user;
    }

    public function update(array $data, int $id): ?Users
    {
        $entity = Users::find($id);
        if (!$entity) {
            return null;
        }

    $permissionId = isset($data['permission_id']) ? $data['permission_id'] : null;
    unset($data['permission_id']);

    Log::info($data);
    $entity->update($data);
    if ($permissionId) {
        $entity->usersPermission()->update(['permission_id' => $permissionId]);
    }
    return $data;
   
    }


    public function delete(int $id): bool
    {
        $entity = Users::find($id);
        if (!$entity) {
            return false;
        }
        $entity->usersPermission()->delete();

        return $entity->delete($id);
    }
}
