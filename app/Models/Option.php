<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public $table = 'options';
    protected $fillable = [
        'points',
        'created_at',
        'updated_at',
        'question_id',
        'option_name',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
