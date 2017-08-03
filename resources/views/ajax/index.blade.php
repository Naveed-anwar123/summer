@extends('layouts.master')

@section('picture')

    <h1>Ajax Testing</h1>
    <div class="col-md-8">
        {!! Form::open(['class'=>'f']) !!}
        <div class="form-group">
            <label for="name"> Firstname </label>
            {!! Form::text('name',null,['class'=>'form-control name']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('submit',['class'=>'form-control btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-3 col-md-offset-1 ">
        <table width='100%' id="result">

            <th>Id</th>
            <th></th>
            <th></th>
            <th>Name</th>

            </table>
    </div>
@endsection