@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/jobs/{{$job->id}}">
                <button type="button" class="btn btn-secondary">BACK</button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Job') }}
                </div>                  
                <div class="card-body">
                    <form method="POST" action="/jobs/{{$job->id}}" aria-label="{{ __('Jobs') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$job->name}}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Description" rows="4" required>{{$job->description}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                <button class="btn btn-danger" type="submit" form="delete">DELETE</button>
                            </div>
                        </div>

                    </form>
                    <form id="delete" action="/jobs/{{$job->id}}" method="post">
                        @csrf
                        @method('DELETE')                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
