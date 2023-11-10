<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'names',
        'email',
        'gender',
        'telephone',
        'position',
      
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
