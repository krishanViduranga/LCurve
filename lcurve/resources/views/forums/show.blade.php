@extends('layouts.app')

@section('dash-left')

  <div class="panel-group">
    
    <div class="panel-primary">
        

              <div class="panel-body">
                    <div class= "panel panel-info" style="border-color:#bbbe64 ;border-width: 2px; ">                    
                        <div class="panel-heading" style="background-color: #d9dbaa !important; ">
                            <a href="{{ route('forums.show', $forum->id ) }}"><b>{{ $forum->title }}</b></a>
                        <br>
                        </div>
                        <div class="panel-body" >
                            <p class="teaser">
                               {{  str_limit($forum->content, 100) }} {{-- Limit teaser to 100 characters --}}
                            </p>
                        </div>                 
                    </div>
                </div>


      {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @can('Edit Forum')
        <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan

       @can('Delete Forum')
          <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
        @endcan

        <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">Are you sure you want to delete?</h5>
                        </div>

                        <div class="modal-footer">          
                            {!! Form::submit('OK',array('class' => 'okbtnstyle')) !!}
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
    <!-- Modal - end -->

        {!! Form::close() !!}
    </div>
</div>

@endsection