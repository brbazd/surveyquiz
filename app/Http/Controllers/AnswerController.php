<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index($id)
    {

        $answers = Question::where('question_id', $id);

        return view('question.answer.index', compact('answers'));

    }

    // public function show($id)
    // {

    //     $question = Question::where('id', $id);

    //     return view('question.show', compact('question'));

    // }

    public function store(Request $request, $id)
    {

        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $question = Question::create([
            'question_id' => $id,
            'body' => $validated->body,
            'value' => $validated->value
        ]);

        return redirect()->route('questions.answer.index');

    }

    // public function update(Request $request, $id)
    // {

    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //     ]);

    //     $question = Question::find('id',$id);

    //     $question->update([
    //         'title' => $validated->title
    //     ]);

    //     return redirect()->route('questions.show', $id);

    // }

    // public function destroy($id)
    // {

    //     $question = Question::find('id',$id);

    //     $question->delete();

    //     return redirect()->route('questions.index');

    // }

}
