<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenResponse extends Model
{
    protected $fillable = [
        'response',
        'question_id',
        'responder_id',
        'questionnaire_id'
        
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function responder()
    {
        return $this->belongsTo(Responder::class);
    }
    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }

}
