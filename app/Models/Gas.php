<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','fix_values','information_values','alert_values','route_image'];
    protected $guarded = [''];
}
