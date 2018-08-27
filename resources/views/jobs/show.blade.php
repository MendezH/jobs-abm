@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/jobs">
                <button type="button" class="btn btn-secondary">BACK</button>
            </a>
            <a href="{{$job->id}}/edit">
                <button type="button" class="btn btn-primary float-right">EDIT</button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">{{$job->name}}</div>
                <div class="card-body">
                    <p>{{$job->description}}</p>
                    <ul class="list-group">

                        <li class="list-group-item">
                            <form method="POST" action="{{$job->id}}/tasks" id="form-task-add">
                                @csrf
                                <div class="input-group">
                                    <select class="custom-select" id="user" name="user" required>
                                        <option disabled selected>Choose...</option>
                                        @foreach( $users as $user )
                                            <option value="{{$user->id}}">{{$user->name}}</option>                                           
                                        @endforeach
                                    </select>
                                    <select class="custom-select" id="role" name="role" required>
                                        <option disabled selected>Choose...</option>
                                        @foreach( $roles as $role )
                                            <option value="{{$role->id}}">{{$role->name}}</option>                                           
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn btn-outline-primary" form="form-task-add">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </li>

                        @if($job->tasks->count() > 0)
                            @foreach( $job->tasks as $task )
                                <li class="list-group-item">
                                    <form method="POST" action="{{$job->id}}/tasks/{{$task->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <select class="custom-select" id="user" name="user" required>
                                                @foreach( $users as $user )
                                                    <option value="{{$user->id}}" 
                                                        @if($task->user->id == $user->id) selected @endif >
                                                        {{$user->name}}
                                                    </option>                                           
                                                @endforeach
                                            </select>
                                            <select class="custom-select" id="role" name="role" required>
                                                @foreach( $roles as $role )
                                                    <option value="{{$role->id}}" 
                                                        @if($task->role->id == $role->id) selected @endif >
                                                        {{$role->name}}
                                                    </option>                                           
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn btn-outline-primary">UPDATE</button>
                                                <button type="submit" class="btn btn-outline-danger" form="task-{{$task->id}}-delete">DELETE</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="task-{{$task->id}}-delete" action="{{$job->id}}/tasks/{{$task->id}}" method="post">
                                        @csrf
                                        @method('DELETE')                        
                                    </form>
                                </li>
                            @endforeach
                        @endif
                
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
