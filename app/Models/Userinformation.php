<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Models\Device;
use App\Models\Town;

class Userinformation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','role_id','device_id','town_id'];
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }

    public function reads(){
        return $this->hasMany( Read::class);
    }
}
