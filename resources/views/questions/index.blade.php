@extends('layouts.mainlayout')

    @section('content')
    <div class="container">
        <div col="row">
            <div class="col-lg-6 offset-lg-3">
                <form id='askAQuestionForm' class="pb-3 border-bottom mb-3" action="/questions/add"method="post" novalidate>
                    <div class="form-group">
                        {{ csrf_field() }}
                            <textarea name="statement" class="form-control"id="question">{{old('statement')}}</textarea>
                            <div class="text-danger">{{$errors->question->first('statement')}} </div>
                    </div>
                    <div class="mt-3" style="text-align:right!important">
                        <button class="btn btn-primary">Ask</button>
                    </div>
                </form>
           
        <h2 class="p-3 mb-0 bg-primary text-white">Questions</h2>
        <div id="accordion">
            <!-- collapsible cards -->
            <div class="accordion">
            @foreach($questions as $question)
                <div class="list-group">
                    <a class="list-group-item dd-flex justify-content-between d-flex align-items-center collapsed" data-toggle="collapse" href="#collapsible{{$question->id}}" data-parent="#accordion">
                        {{ $question->statement}} <span style="text-align:righ!important" class="text-right badge rounded-pill badge-primary">{{ $question->answers()->count() }} answers</span>
                    </a>
                </div>
                <div class="collapse" id="collapsible{{$question->id}}">
                    <div class="card-footer">
                        @php $num = $question->answers()->count() @endphp
                        @if($question->answers()->count() > 0)
                        <h5>Most recent {{$num >= 2 ? 'answers' : 'answer'}} :</h5>
                        @else
                        <h5><a href="/questions/{{$question->id}}">Add an answer</a></h5>
                        @endif
                    <ul class="list-group">
                        @foreach($question->answers()->limit(3)->reorder('id','desc')->get() as $answer)
                            <li class="list-group-item">{{$answer->answer_text ?? ''}}</li>
                        @endforeach
                    </ul>
                    <div class="text-right pt-3">
                        @if($num > 0)
                            <a class="btn btn-outline-dark" href="/questions/{{$question->id}}">View more or submit an answer</a>
                        @else
                            
                        @endif
                    </div>
                    
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    
    @endsection