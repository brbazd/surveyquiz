<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {

        $assignments = Assignment::all();

        return view('assignment.index', compact('assignments'));

    }

    public function create()
    {

        return view('assignment.create');

    }

    public function show($id)
    {

        $assignment = Assignment::find($id);

        return view('assignment.show', compact('assignment'));

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $assignment = Assignment::create([
            'title' => $validated['title']
        ]);

        return redirect()->route('assignments.index');

    }

    // public function update(Request $request, $id)
    // {

    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //     ]);

    //     $assignment = Assignment::find($id);

    //     $assignment->update([
    //         'title' => $validated->title
    //     ]);

    //     return redirect()->route('assignments.show', $id);

    // }

    public function destroy($id)
    {

        $assignment = Assignment::find($id);

        $assignment->delete();

        return redirect()->route('assignments.index');

    }
}
