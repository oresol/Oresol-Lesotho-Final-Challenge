<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
    use HasFactory;
    protected $fillable=['companyName','companyLogo','website','telePhoneNumber','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stores(){
        return $this->hasMany(Store::class);
    }

}
