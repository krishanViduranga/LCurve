@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
     <div class="panel-body">
          <div class= "panel panel-info" style="border-color:#bbbe64 ;border-width: 2px; ">                    
              <div class="panel-heading" style="background-color: #d9dbaa !important; ">
                  <a href="{{ route('tasks.show', $task->id ) }}"><b>{{ $task->title }}</b></a>
                <br>
              </div>
              <div class="panel-body" >
                <div class="container col-lg-11">
                  <div class="list-group">
                    <li class="list-group-item"><p><b>Title:</b> {{$task->title}}</p></li>
                    <li class="list-group-item"><p><b>Due Date:</b> {{$task->due_date}}</p></li>
                    <li class="list-group-item"><p><b>Content:</b> {{$task->content}}</p></li>
                    <li class="list-group-item"><p><b>Task Type:</b> {{$task->taskType}}</p></li>
                    <li class="list-group-item"><p><b>Assignment type:</b> {{$task->  isAssignment}}</p></li>
            
                  </div>
                </div>
                 
              </div> 
              <div class="row">
    <div class="col-lg-8" ></div>
    {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['tasks.destroy', $task->id] ]) !!} 
    <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>

    <!--starts tasks edit permissions-->
    @if(Auth::User()->can('Edit Task') || Auth::User()->can('Edit Task '.$task->id))
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success" role="button">Edit</a>
    @endif

    <!--starts tasks delete permissions-->
    
    @if(Auth::User()->can('Delete Task') || Auth::User()->can('Delete Task '.$task->id))                       
      {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
    @endif
    {!! Form::close() !!}
     <br><br>
  </div>                
</div>
</div>

</div>
</div>


@endsection
