<?php

namespace App;

use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name','guard_name'];

    protected $guarded = [''];

    public function permissions(){
        return $this->hasMany(Permission::class);
    }


    public function users(){
        return $this->hasMany(User::class);
    }

    public function roleHasPermisions(){
        return $this->hasMany(RoleHasPermission::class);
    }

}
