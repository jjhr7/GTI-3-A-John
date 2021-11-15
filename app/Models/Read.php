<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'read_date', 'id_device'];

    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
