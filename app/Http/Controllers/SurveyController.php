<?php

namespace App\Http\Controllers;

use App\Models\Output;
use App\Models\Question;
use App\Models\Assignment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    public function firstPart()
    {

        $questions = Question::all();

        return view('survey.first', compact('questions'));

    }

    public function submitFirst(Request $request)
    {

        $output = $request->validate([
            'val' => 'required',
            'val.*' => 'required'
        ]);

        Output::create([
            'data' => json_encode($output),
            'ip_address' => $request->ip()
        ]);

        return redirect()->route('survey.second');

    }

    public function secondPart()
    {

        $assignments = Assignment::all();

        return view('survey.second', compact('assignments'));

    }

    public function submitSecond(Request $request)
    {

        $validated = $request->validate([
            'val' => 'required',
            'val.*' => 'required|string'
        ]);


        $output = Output::where('ip_address', $request->ip())->first();

        $output->data2 = json_encode($validated);

        $output->save();

        return redirect()->route('survey.end');

    }

    public function thanks()
    {
        return view('survey.end');
    }
}
