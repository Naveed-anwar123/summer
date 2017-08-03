@extends('layouts.master')

@section('blog')

    <h1>Add new Post</h1>

    <div class="container-fluid row">
        {!! Form::open(['method'=>'post','action'=>'BlogController@store','files'=>true]) !!}

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Title</label>
                {!! Form::text('title',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Desctiption</label>
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('body')}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::file('file',['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('file')}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::submit('POST',['class'=>'form-control btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>



@endsection