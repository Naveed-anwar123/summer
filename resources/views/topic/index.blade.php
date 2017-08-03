@extends('layouts.master')

@section('topic')

    <h1>Create New Topic</h1>
    <div class="col-md-8">

        {!! Form::open(['method'=>'post','action'=>'ValidateController@store']) !!}
        <div class="form-group {{$errors->has('topic') ? 'has-error' :''}}">
            <label for="name"> Topic  </label>
            {!! Form::text('topic',null,['class'=>'form-control name']) !!}
            @if ($errors->has('topic'))
                <span class="help-block">
                                        <strong>{{ $errors->first('topic') }}</strong>
               </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('submit',['class'=>'form-control btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

