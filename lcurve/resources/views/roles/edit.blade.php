@extends('layouts.app')
@section('dash-left')

    <h3><i class='fa fa-key'></i>@lang('applang.editRole') {{$role->name}}</h3>
    <hr style="border-color:#848991">

    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', Lang::get('applang.roleName')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>@lang('applang.assignPermissions')</b></h5>

        <table class="table">
          <thead>
            <tr>
              <th>View</th>
              <th>Edit</th>
              <th>Create</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <ul class="list-group">
                  @foreach ($permissions as $permission)
                    @if (explode(' ',trim($permission->name))[0]=="View")
                      {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                      {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endif
                  @endforeach
                </ul>
              </td>
              <td>
                <ul class="list-group">
                  @foreach ($permissions as $permission)
                    @if (explode(' ',trim($permission->name))[0]=="Edit")
                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endif
                  @endforeach
                </ul>
              </td>
              <td>
                <ul class="list-group">
                  @foreach ($permissions as $permission)
                    @if (explode(' ',trim($permission->name))[0]=="Create")
                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endif
                  @endforeach
                </ul>
              </td>
              <td>
                <ul class="list-group">
                  @foreach ($permissions as $permission)
                    @if (explode(' ',trim($permission->name))[0]=="Delete")
                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endif
                  @endforeach
                </ul>

              </td>
            </tr>
          </tbody>
        </table>

        <!--permission assign checkboxes-->

        {{ Form::submit(Lang::get('applang.edit'), array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}


@endsection
