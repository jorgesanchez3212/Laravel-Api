<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserPermission;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = Users::all();
        $permissions = Permission::all();

        foreach ($users as $user) {
            foreach ($permissions as $permission) {
                UserPermission::create([
                    'user_id' => $user->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    
    }
}
