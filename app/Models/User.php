<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        //'role',
        'mobile',
        'sub_contractor',
        'vehicle_make',
        'vehicle_reg',
        'cscs_number',
        'password',
        'induction_completed',
        'induction_expires',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userResults()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }

    public function sites()
    {
        return $this->belongsToMany(\App\Models\Site::class, 'site_users')
            ->withPivot('status', 'id', 'time_on_site', 'time_off_site')
            ->orderBy('id');
    }

    public function siteInductions()
    {
        return $this->hasMany(SiteInduction::class, 'user_id', 'id');
    }

    public function siteBans()
    {
        return $this->hasMany(SiteInduction::class, 'completed_by', 'id');
    }

    public function siteUsers()
    {
        return $this->belongsToMany(\App\Models\SiteUser::class);
    }

    public function siteManager()
    {
        return $this->belongsTo(Site::class, 'id', 'site_manager');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'sub_contractor', 'id');
    }
}
