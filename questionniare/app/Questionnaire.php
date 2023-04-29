<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'user_id',
        'ethics_statement',
        'title',
        'status',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function responder(){
        return $this->hasMany(Responder::class);
    }
    
    public function multiChoiceResponses(){
        return $this->hasMany(MultiChoiceResponse::class);
    }
    public function openResponses(){
        return $this->hasMany(OpenResponse::class);
    }
}
