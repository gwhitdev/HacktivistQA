<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Modes\Answer;

class QuestionsController extends Controller
{
    public function index()
       {
            $questions = Question::reorder('id','desc')->get();
            
            return view('questions/index',['questions'=>$questions]);
       }
       
       public function add(Request $request)
       {
          $request->validateWithBag('question',[
               'statement' => 'required|min:5|ends_with:?'
          ],[
               'statement.required' => 'You must write something to submit a question.',
               'statement.min' => 'Your question must be at least 5 characters long.',
               'statement.ends_with' => 'Your question must finish with a question mark (?).'
          ]);
               $question = new Question();
               $question->statement = $request->input('statement');
               $question->save();
               return redirect('/');
       }

       public function question(Request $request, $question_id)
       {
            $question = Question::find($question_id);
            $answers = Answer::where('question_id',$question_id)->orderBy('id')->get();
            return view('questions/question',['question'=>$question,'answers'=>$answers]);
       }

}
