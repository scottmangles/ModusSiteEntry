<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
        'question_name',
    ];

    public function questionOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

    public function questionsResults()
    {
        return $this->belongsToMany(Result::class);
    }
}
