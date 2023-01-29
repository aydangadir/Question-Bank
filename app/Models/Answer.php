<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['answer', 'isCorrect', 'questionID'];
    public $timestamps = false;
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;


    // public static function get_answers($id)
    // {
    //     return Answer::where('questionID', $id)->get();
    // }

    public function Question()
    {
        return $this->belongsTo('App\Models\Question', 'questionID', 'id');
    }
}
