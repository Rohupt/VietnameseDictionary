<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model {
    protected $table = "surveys";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = false;

    public function options() {
        $options = [$this->belongsTo(Entry::class, 'option1')->first(), $this->belongsTo(Entry::class, 'option2')->first()];
        if ($option3 = $this->belongsTo(Entry::class, 'option3')->first())
            array_push($options, $option3);
        if ($option4 = $this->belongsTo(Entry::class, 'option4')->first())
            array_push($options, $option4);
        return $options;
    }

    public function answers() {
        return $this->hasMany(SurveyAnswer::class, 'surveyID');
    }
}