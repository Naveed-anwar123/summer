@extends('layouts.blog')

@section('blog')

    <h1>View All Post</h1>
    @foreach($posts as $single)

    <div class="col-md-12">
        <div class="post-style10">
            <div class="post-thumb10">
                <a href="#" title=""><img src="profile/{{$single->file}}" alt="" /></a>
            </div>
            <div class="post-detail10">
                <div class="post-author-share-post">
                    <div class="posted-by">
                        <h5><a href="#" title=""><img src="profile/{{$single->user->file}}" width="83px" height="93px" alt="" /></a><i>Posted By :</i> <a href="#" title="">{{$single->user->name}}</a></h5>
                    </div>
                    <div class="quick-post-share">
                        <span><i class="fa fa-share-alt"></i></span>
                        <ul>
                            <li class="gl-share"><a href="#" title=""><i class="fa fa-google"></i></a></li>
                            <li class="tw-share"><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                            <li class="pt-share"><a href="#" title=""><i class="fa fa-pinterest"></i></a></li>
                            <li class="fb-share"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div><!-- Post author share -->
                <div class="quick-metas">
                    <ul>
                        <li><a href="#" title=""><i class="fa fa-heart-o"></i>Likes : 284</a></li>
                        <li><a href="#" title=""><i class="fa fa-comment-o"></i>Comments : 42</a></li>
                    </ul>
                </div>
                <a href="#" title="">Read More</a>
            </div>
            <div class="post-info10">
                <div class="post-date">
                    <a href="#" title="">{{$single->created_at->diffForHumans()}}</a>
                </div>
                <h2><a href="#" title="">{{$single->title}}</a></h2>
                <p>{{$single->body}}</p>
            </div>
        </div><!-- post style 10 -->
    </div>
    </div>
    </div>
    @endforeach
@endsection