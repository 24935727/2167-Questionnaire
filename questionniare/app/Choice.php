<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'choice',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function multiChoiceResponses()
    {
        return $this->hasMany(MultiChoiceResponse::class);
    }
}
