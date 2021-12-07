<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','date','message','type'];
    protected $guarded = [''];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
