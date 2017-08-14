@extends('layouts.forumlayout')
@section('forumlist')
   @foreach($topic as $single)
    <div class="post">
        <div class="wrap-ut pull-left">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="profile/{{$single->user->file}}" alt="" width="37px" height="37px"/>
                    <div class="status green">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" />
                </div>
            </div>
            <div class="posttext pull-left">
                <h2><a href="{{route('forums.show',$single->id)}}">{{$single->title}}</a></h2>
                <p>{{$single->content}}</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfo pull-left">
            <div class="comments">
                <div class="commentbg">
                    560
                    <div class="mark"></div>
                </div>

            </div>
            <div class="views"><i class="fa fa-eye"></i> 1,568</div>
            <div class="time"><i class="fa fa-clock-o"></i> {{$single->created_at->diffForHumans()}}</div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endforeach
@endsection

@section('categories')
    <div class="sidebarblock">
        <h3>Categories</h3>
        <div class="divline"></div>
        <div class="blocktxt">
            <ul class="cats">
                <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>
                <li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>
                <li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>
                <li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>
                <li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>
                <li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>
                <li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>
            </ul>
        </div>
    </div>
@endsection


@section('mythreads')

    <div class="sidebarblock">
        <h3>My Active Threads</h3>
        @foreach(Auth::user()->mytopics as $my)
            <div class="divline"></div>
            <div class="blocktxt">
                <b>{{$my->title}}</b>
            </div>
            <div class="divline"></div>

    @endforeach
    </div>
@endsection

@section('headnavbar')
    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{route('forums.index')}}"><img src="forum/images/logo.jpg" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#" >{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu" role="menu">


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <form action="{{route('forums.create')}}" method="get" class="form">
                            <button class="btn btn-primary">Start New Topic</button>
                        </form>
                    </div>
                    <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                    <div class="avatar pull-left dropdown">
                        <a data-toggle="dropdown" href="#"><img src="profile/{{Auth::user()->file}}" width="37px" height="37px" alt="" /></a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>

                            <li role="presentation"><a role="menuitem" tabindex="-3" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Log Out</a></li>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('pagination')
    <ul class="paginationforum">
        {{ $topic->links() }}
    </ul>
@endsection