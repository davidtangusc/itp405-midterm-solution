<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $request->validate([
            'answer' => 'required|min:5',
        ]);

        $answer = new Answer();
        $answer->body = $request->input('answer');
        $answer->question_id = $questionId;
        $answer->save();

        return redirect()
            ->route('question.show', $questionId)
            ->with('success', "Your answer \"{$answer->body}\" was successfully posted.");
    }
}
