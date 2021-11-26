<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id','device_id','latitude','longitude','type_read','value','date'];

    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
