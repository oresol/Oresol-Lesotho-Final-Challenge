<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StoreTypes;
use App\Models\Company;
use App\Models\Tag;

class Store extends Model
{
    use HasFactory;
    protected $fillable=['storeName','storePhoto','storeAddress','storeType_id','company_id','telePhoneNumber','longitude','latitude'];

    public function storeType(){
        return $this->belongsTo(StoreTypes::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
