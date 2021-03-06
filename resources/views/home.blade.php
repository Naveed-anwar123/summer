@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-md-10   ">
                        <h4> Your name is {{ Auth::user()->name  }}</h4>
                    </div>

                    <div class=" col-md-2">
                        <img src="profile/{{Auth::user()->file}}" class="img-responsive img-circle" >
                    </div>
                    <div class=" col-md-8">

                    @if(Auth::user()->affiliate_id)
                        <input type="text" readonly="readonly"
                               value="{{url('register').'/?ref='.Auth::user()->affiliate_id}}">
                    @endif
                    </div>
                    <br><br><br>
                        <div class=" col-md-8">
                            {{--<h4>Your last login time is {{date('d F Y h:m A',strtotime(Auth::user()->last_login))}}</h4>--}}
                            <h4>Your last login time is {{Auth::user()->last_login}}</h4>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
