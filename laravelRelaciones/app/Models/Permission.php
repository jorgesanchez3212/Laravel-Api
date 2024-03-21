<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol_id',
        'type',
        'namePermision'
    ];



    public function userPermission(){
        return $this -> hasMany(UserPermission::class, 'permission_id');
    }

    public function rol(){
        return $this -> belongsTo(Rol::class, 'rol_id');
    }
}
