@extends('layouts.master')

@section('picture')

    <h1>Add new Picture</h1>

<div class="container-fluid row">
    {!! Form::open(['method'=>'post','action'=>'PictureController@store','files'=>true]) !!}
    <div class="form-group">
    {!! Form::file('file',['class'=>'form-control']) !!}
        <div class="help-block ">
            <span >{{$errors->first('file')}}</span>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Upload',['class'=>'form-control btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>



@endsection