@extends('layouts.mainlayout')

    @section('content')
    <div class="container">
        <div col="row">
            <div class="col-lg-6 offset-lg-3">
                <form id='askAQuestionForm' class="pb-3 border-bottom mb-3" action="/questions/add"method="post" class="pb-3" novalidate>
                    <div class="form-group">
                        {{ csrf_field() }}
                            <textarea name="statement" class="form-control"id="question">{{old('statement')}}</textarea>
                        
                    </div>
                    <div class="mt-3" style="text-align:right!important">
                        <button class="btn btn-primary">Ask</button>
                    </div>
                </form>
           
        <h2 class="mb-3 p-3 bg-primary text-white">Questions</h2>
        <div class="list-group list-group-flush">
            @foreach($questions as $question)
            <a href="/questions/{{$question->id}}" style="display:block"class="list-group-item list-group-item-action d-flex justify-content-between align-items-center ">
                <h5 class="m-0">
                    {{ $question->statement }}
                </h5>
                <div id='test'>
                </div>
                <div>
                <span class="badge rounded-pill badge-primary">
                    {{ $question->answers()->count() }} answers
                </span>
                </div>
            </a>
            @endforeach
            </div>
    </div>


    @endsection