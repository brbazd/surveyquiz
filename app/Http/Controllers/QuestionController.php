<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        $questions = Question::all();

        return view('question.index', compact('questions'));

    }

    public function show($id)
    {

        $question = Question::find($id);

        return view('question.show', compact('question'));

    }

    public function create()
    {

        return view('question.create');

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $question = Question::create([
            'title' => $validated['title']
        ]);

        return redirect()->route('questions.index');

    }

    // public function update(Request $request, $id)
    // {

    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //     ]);

    //     $question = Question::find($id);

    //     $question->update([
    //         'title' => $validated->title
    //     ]);

    //     return redirect()->route('questions.show', $id);

    // }

    public function destroy($id)
    {

        $question = Question::find($id);

        $question->delete();

        return redirect()->route('questions.index');

    }

    public function create_answer($id)
    {

        $question = Question::find($id);

        return view('answer.create',compact('question'));
    }

    public function add_answer(Request $request, $id)
    {

        $validated = $request->validate([
            'body' => 'required|string',
            'value' => 'required|string'
        ]);

        $answer = Answer::create([
            'question_id' => $id,
            'body' => $validated['body'],
            'value' => $validated['value']
        ]);

        return redirect()->route('questions.show',$id);
    }

    public function delete_answer($id, $aid)
    {
        $answer = Answer::find($aid);

        $answer->delete();

        return redirect()->route('questions.show',$id);
    }




}
