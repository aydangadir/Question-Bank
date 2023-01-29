<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'mark', 'feedback', 'questionTypeID'];
    public $timestamps = false;
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    public function QuestionType()
    {
        return $this->belongsTo('App\Models\QuestionType', 'questionTypeID', 'id');
    }

    public function Answer()
    {
        return $this->hasMany(Answer::class, 'questionID');
    }
}
