<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model {
    protected $table = "survey_answers";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = false;
    const TYPE = 4;

    protected $fillable = [
        'id', 'surveyID', 'userID', 'userIP', 'answer'
    ];

    public function survey() {
        return $this->belongsTo(Survey::class, 'surveyID');
    }

    public function answerer() {
        return $this->belongsTo(User::class, 'userID');
    }

    public function answer() {
        switch ($this->answer)  {
            case 1:
                return $this->survey()->option1;
            case 2:
                return $this->survey()->option2;
            case 3:
                return $this->survey()->option3;
            case 4:
                return $this->survey()->option4;
            default:
                return null;
        }
    }
}