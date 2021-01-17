<?php

namespace App\Http\Controllers;

use App\Helpers\Snowflake\Snowflake;
use App\Models\SurveyAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($survey, Request $request)
    {
        error_log(gettype($request->ip()));
        $userID = Auth::check() ? Auth::id() : 1;
        $sf = new Snowflake(SurveyAnswer::TYPE);
        SurveyAnswer::create([
            'id' => $sf->get(),
            'userID' => $userID,
            'surveyID' => $survey,
            'userIP' => $request->ip(),
            'answer' => $request->input('answer')
        ]);
        return response('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyAnswer  $surveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyAnswer $surveyAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyAnswer  $surveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyAnswer $surveyAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyAnswer  $surveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyAnswer $surveyAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyAnswer  $surveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyAnswer $surveyAnswer)
    {
        //
    }
}
