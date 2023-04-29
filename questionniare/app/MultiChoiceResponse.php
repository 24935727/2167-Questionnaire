<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiChoiceResponse extends Model
{
    protected $fillable = [
        'choice_id',
        'questionnaire_id',
        'responder_id',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }

    public function responder()
    {
        return $this->belongsTo(Responder::class);
    }
    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
}
