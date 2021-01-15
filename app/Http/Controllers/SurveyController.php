<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;
use stdClass;

class SurveyController extends Controller {
    function get() {
        error_log('Hey', 4);
        $survey = Survey::inRandomOrder()->first();
        $answers = [];
        for ($i=1; $i <= sizeof($survey->options()); $i++) { 
            $answer = new stdClass();
            $answer->entry = $survey->options()[$i - 1]->entry;
            $answer->count = $survey->answers()->where('answer', $i)->count();
            array_push($answers, $answer);
        }
        $survey->answers = $answers;
        echo json_encode($survey);
    }
}
