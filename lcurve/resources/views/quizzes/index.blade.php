@extends('layouts.app')

@section('dash-left')

@foreach($quizzes as $quiz)

    <h3 class="page-title">{{$quiz->task->title}}</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['quizzes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
        </div>

    @isset($quiz)
        <div class="panel-body">
        @php
          $i = 1;
        @endphp

        @foreach($quiz->questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @isset($question->options)
                      @foreach($question->options as $option)
                          <br>
                          <label class="radio-inline">
                              <input
                                  type="radio"
                                  name="answers[{{ $question->id }}]"
                                  value="{{ $option->id }}">
                              {{ $option->option }}
                          </label>
                      @endforeach
                    @endisset
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endisset
    </div>

    {!! Form::submit('submit_quiz', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

@endforeach
@endsection
