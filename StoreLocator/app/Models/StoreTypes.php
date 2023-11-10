<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
class StoreTypes extends Model
{
    use HasFactory;
    protected $fillable=['storeType'];

    public function stores(){
        return $this->hasMany(Store::class);
    }
}
