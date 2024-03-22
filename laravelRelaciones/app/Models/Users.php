<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol_id',
        'name',
        'email',
        'city',
        'postalCode',
    ];


    public function usersPermission(){
        return $this->hasMany(UserPermission::class,'user_id');
    }

    public function role(){
        return $this->belongsTo(Rol::class);
    }





}
