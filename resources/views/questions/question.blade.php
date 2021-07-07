@extends('layouts.mainlayout')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <ul class="list-group-flush mt-3">
                <li class="list-group-item active"><h2>{{$question->statement}}</h2></li>
                @foreach($answers as $answer)
                   <li class="list-group-item"> {{ $answer->answer_text }}</li>
                @endforeach
                <li class="list-group-item active mt-5">
                    <h3>Answer the question!</h3>
                </li>
                <li class="list-group-item">
                    <form class="mt-3" action="/questions/{{$question->id}}/answer"method="post"novalidate>
                        <div class="form-group mb-3">
                            {{csrf_field()}}
                            <input type="hidden"name="question_id"value="{{$question->id}}">
                            <textarea name="answer_text" class="form-control form-control-lg">{{old('answer')}}</textarea>
                            <div class="text-danger">{{$errors->answer->first('answer_text')}} </div>
                        </div>
                        <div style="text-align:right!important">
                            <button class="btn btn-primary">Answer question</button>
                        </div>
                    </form>
                </li>
                </ul>
            </div>
        </div>
        
    </div>


    @endsection