<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','time_activity','distance_traveled','date'];
    protected $guarded = [''];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
