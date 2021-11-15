<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Zone;
use App\Models\Healthytown;

class Town extends Model
{
    use HasFactory;

    protected $fillable = ['postal_code','name','area','altitude','o2avg','geojson','flag_img'];
    protected $guarded = [''];

    public function zones(){
        return $this->hasMany(Zone::class);
    }

    public function timesHealthyTown(){
        return $this->hasMany(Healthytown::class);
    }
}
