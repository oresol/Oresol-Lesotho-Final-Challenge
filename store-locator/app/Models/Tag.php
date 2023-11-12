<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'admin_id'];
    
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
