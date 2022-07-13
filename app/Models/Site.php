<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'site_manager',
        'open_at',
        'closed_at',
        'qr_src',
        'status',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'site_users')
            ->withPivot('status', 'id', 'time_on_site', 'time_off_site')
            ->orderBy('id');
    }

    public function siteInductions()
    {
        return $this->hasMany(SiteInduction::class, 'site_id', 'id');
    }

    public function siteUsers()
    {
        return $this->hasMany('App\Models\SiteUser', 'id', 'site_id');
    }

    public function siteManager()
    {
        return $this->hasOne(User::class, 'id', 'site_manager');
    }
}
