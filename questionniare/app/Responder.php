<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responder extends Model
{
    protected $fillable = [
        'name',
        'email',
        'questionnaire_id'
    ];

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
    public function openResponses()
    {
        return $this->hasMany(OpenResponse::class);
    }
    public function multiChoiceResponses()
    {
        return $this->hasMany(MultiChoiceResponse::class);
    }
        
}
