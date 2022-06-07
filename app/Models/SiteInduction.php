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

    public function sites()
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function users()
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

}
