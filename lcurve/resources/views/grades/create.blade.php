@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Section</h3>
        <hr style="border-color:#848991">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'grades.store')) }}

        <div class="form-group">
            {{ Form::label('name', 'Grade') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>


            {{ Form::submit('Create Grade', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection