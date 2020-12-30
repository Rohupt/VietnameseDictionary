<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model {
    protected $table = "survey";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = false;

    public function options() {
        $options = [$this->belongsTo(Entry::class, 'option1'), $this->belongsTo(Entry::class, 'option2')];
        if ($option3 = $this->belongsTo(Entry::class, 'option3') != null)
            array_push($options, $option3);
        if ($option4 = $this->belongsTo(Entry::class, 'option4') != null)
            array_push($options, $option4);
        return $options;
    }

    public function answers() {
        return $this->hasMany(SurveyAnswer::class, 'surveyID');
    }
}