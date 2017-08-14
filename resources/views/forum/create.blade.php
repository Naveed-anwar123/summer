@extends('layouts.app')

@section('discussion')
<div class="col-md-4 col-md-offset-4">

        {!! Form::open(['method'=>'post','action'=>'ForumController@store']) !!}
        <div class="form-group {{$errors->has('title') ? 'has-error' :''}}">
            <label for="name"> Topic  </label>
            {!! Form::text('title',null,['class'=>'form-control name']) !!}
            @if ($errors->has('title'))
                <span class="help-block">
                 <strong>{{ $errors->first('title') }}</strong>
               </span>
            @endif
        </div>
    <div class="form-group {{$errors->has('content') ? 'has-error' :''}}">
        <label for="name"> Descripion  </label>
        {!! Form::textarea('content',null,['class'=>'form-control name']) !!}
        @if ($errors->has('content'))
            <span class="help-block">
                 <strong>{{ $errors->first('content') }}</strong>
               </span>
        @endif
    </div>

        <div class="form-group">
            {!! Form::submit('Start',['class'=>'form-control btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection