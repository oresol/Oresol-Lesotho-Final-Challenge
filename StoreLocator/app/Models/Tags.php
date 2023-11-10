<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Tags extends Model
{
    use HasFactory;
    protected $fillable=['tagName'];

    public function stores(){
        return $this->belongsToMany(Store::class);
    }

}
