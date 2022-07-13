<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact_person',
        'phone',
        'email',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'sub_contractor');
    }
}
