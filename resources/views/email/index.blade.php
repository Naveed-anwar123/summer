@extends('layouts.master')
@section('email')
    <h1>Send Email</h1>
    <div class="container-fluid row">
        {!! Form::open(['method'=>'post','action'=>'EmailController@store']) !!}

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Subject</label>
                {!! Form::text('subject',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Sender Name</label>
                {!! Form::text('sname',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Sender Email</label>
                {!! Form::text('semail',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Receiver Name</label>
                {!! Form::text('rname',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Receiver Email</label>
                {!! Form::text('remail',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Content</label>
                {!! Form::text('content',null,['class'=>'form-control']) !!}
                <div class="help-block ">
                    <span >{{$errors->first('title')}}</span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                {!! Form::submit('Send Mail',['class'=>'form-control btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>



@endsection