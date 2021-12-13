<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reads extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'read_date', 'id_device'];

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
