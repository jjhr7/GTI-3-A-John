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
        return $this->belongsToMany(Permission::class,RoleHasPermission::class);
    }


    public function users(){
        return $this->hasMany(User::class);
    }


}
