<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'open_at',
        'closed_at',
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User', 'site_users')
            ->withPivot('status', 'id', 'time_on_site', 'time_off_site')
            ->orderBy('id');
    }

    public function siteInductions()
    {
        return $this->hasMany(SiteInduction::class, 'site_id', 'id');
    }
}
