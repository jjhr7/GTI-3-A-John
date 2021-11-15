<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Town;

class Healthytown extends Model
{
    use HasFactory;

    protected $fillable = ['town_id','date'];

    public function town(){
        return $this->belongsTo(Town::class);
    }
}
