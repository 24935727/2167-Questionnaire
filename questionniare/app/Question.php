<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'type',
        'questionnaire_id'
    ];

    public function choices(){
        return $this->hasMany(Choice::class);
    }
    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
    public function openResponses(){
        return $this->hasMany(OpenResponse::class);
    }
    public function multiChoiceResponses(){
        return $this->hasMany(MultiChoiceResponse::class);
    }
    
}
