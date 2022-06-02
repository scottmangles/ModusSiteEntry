<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'site_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function inductionSites()
    {
        return $this->hasMany(Site::class, 'site_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

}
