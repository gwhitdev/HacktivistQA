<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswersController extends Controller
{
    public function add(Request $request)
    {
        $request->validateWithBag('answer', [
            'answer_text' => 'required|min:5',
        ],[
            'answer_text.required' => 'You must write something to provide an answer.',
            'answer_text.min' => 'Your answer must be at least 5 characters long.'
        ]);
        $question_id = $request->input('question_id');
        $answer = new Answer();
        $answer->answer_text = $request->input('answer_text');
        $answer->question_id = $question_id;
        $answer->save();
        return redirect("/questions/$question_id");
    }
}
