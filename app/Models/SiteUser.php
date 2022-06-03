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
        'time_on_site', 
        'time_off_site'
    ];
}
