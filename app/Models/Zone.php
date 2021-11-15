<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Town;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['o2avg','area','geojson','town_id'];
    protected $guarded = [''];

    public function town(){
        return $this->belongsTo(Town::class);
    }
}
