@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="float-left">Jobs List</h3>
            <a href="jobs/create">
                <button type="button" class="btn btn-primary float-right">ADD</button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach( $jobs as $job )
                    <li class="list-group-item">
                        <a s href="/jobs/{{$job->id}}">
                            {{$job->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
