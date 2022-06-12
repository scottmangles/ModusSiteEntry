<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'user_id',
        'status',
        'signed_in_by',
        'signed_out_by',
        'time_on_site', 
        'time_off_site'
    ];

    public function sites(){
        return $this->belongsToMany('App\Models\Site');
    }

    public function users(){
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }

    
}
