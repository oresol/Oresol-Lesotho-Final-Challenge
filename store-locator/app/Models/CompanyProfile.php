<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_name',
        'website',
        'telephone_number',
        'image_path',
        'admin_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
