<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description'
    ];


    public function user(){
        return $this->hasOne(Users::class,'rol_id');
    }

    public function permission(){
        return $this->hasMany(Permission::class,'rol_id');
    }
}
