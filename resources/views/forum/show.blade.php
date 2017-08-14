@extends('layouts.forumlayout')
@section('forumlist')
        <!-- POST -->
        <div class="post beforepagination">
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="../profile/{{$topic->user->file}}" alt="" width="37px" height="37px">
                        <div class="status green">&nbsp;</div>

                    </div>


                </div>
                <div class="posttext pull-left">
                    <h2>{{$topic->title}}</h2>
                    <p>{{$topic->content}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="likeblock pull-left">

                    <div class="posted pull-left"><i class="fa fa-user"></i> Posted By : {{$topic->user->name}}</div>
                </div>



                <div class="posted pull-right"><i class="fa fa-clock-o"></i> Posted on : {{$topic->created_at->diffForHumans()}}</div>


                <div class="clearfix"></div>
            </div>
        </div><!-- POST -->


      <!-- POST -->



        <!-- POST -->
        <!-- POST -->



        <!-- POST -->

@endsection

@section('readcomments')
<br>
@foreach($topic->replies as $all)
    <div class="post">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="../profile/{{App\User::find($all->user_id)->file}}" alt="" width="37px" height="37px">
                    <div class="status red">&nbsp;</div>
                </div>


            </div>
            <div class="posttext pull-left">

                <blockquote>
                    <span class="original">{{App\User::find($all->user_id)->name}}</span>
                    {{$all->reply}}
                </blockquote>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
            </div>

            <div class="prev pull-left">
                <a href="#"><i class="fa fa-reply"></i></a>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{$all->created_at->diffForHumans()}}</div>

            <div class="next pull-right">
                <a href="#"><i class="fa fa-share"></i></a>

                <a href="#"><i class="fa fa-flag"></i></a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    @endforeach
@endsection




@section('addcomments')
    <div class="post">
<form action="{{route('reply.store')}}" method="post" >
    {{csrf_field()}}
<input type="hidden" value="{{$topic->id}}" name="topicid" >
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="../profile/{{Auth::user()->file}}" alt="" width="37px" height="37px">
                        <div class="status red">&nbsp;</div>
                    </div>


                </div>
                <div class="posttext pull-left">
                    <div class="textwraper">
                        <div class="postreply">Post a Reply</div>
                        <input type="text" name="reply" id="reply" class="form-control">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="pull-right postreply">
                    <div class="pull-left">
                        <input type="submit" class="btn btn-primary" value="Post Reply"></div>

                </div>

            </div>
        </form>
    </div>
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
    </div>
    @endforeach
@endsection

@section('headnavbar')
    <div class="headernav">
        <div class="container">
            <div class="row"><div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{route('forums.index')}}"><img src="../forum/images/logo.jpg" alt=""  /></a></div>
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
                        <a data-toggle="dropdown" href="#"><img src="../profile/{{Auth::user()->file}}" width="37px" height="37px" alt="" /></a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>

                            <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Log Out</a></li>
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
        <li class="hidden-xs"><a href="#">1</a></li>
        <li class="hidden-xs"><a href="#">2</a></li>
        <li class="hidden-xs"><a href="#">3</a></li>
        <li class="hidden-xs"><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#" class="active">7</a></li>
        <li><a href="#">8</a></li>
        <li class="hidden-xs"><a href="#">9</a></li>
        <li class="hidden-xs"><a href="#">10</a></li>
        <li class="hidden-xs hidden-md"><a href="#">11</a></li>
        <li class="hidden-xs hidden-md"><a href="#">12</a></li>
        <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
        <li><a href="#">1586</a></li>
    </ul>
@endsection



