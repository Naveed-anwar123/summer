@extends('layouts.master')

@section('picture')

    <h1>View All Pictures</h1>
    @foreach($pictures as $single)
    <div class="thumbnail col-md-8 col-md-offset-2">
        <img src="images/{{$single->path}}" class="img-responsive" alt="Attatchment Unavailable ">
        <div >
            Added {{$single->created_at->diffForHumans()}}
            {{--<i class="glyphicon glyphicon-heart" style="color: deeppink" >--}}
                {{----}}
            {{--</i>--}}
        </div>

    </div>
    @endforeach


@endsection