<?php

namespace App\Models;

use App\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $fillable = ['role_id','permission_id'];
    public $timestamps = false;

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
