<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class SiteInduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'site_id',
        'status',
        'completed_by',
        'notes',
        'created_at',
        'updated_at',
    ];
 
    public function sites()
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function userBanned()
    {
        return $this->belongsTo(User::class, 'completed_by', 'id');
    }
}
 