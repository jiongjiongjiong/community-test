@extends('app')
@section('content')

    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img alt="64x64" class="media-object img-circle" src="{{ $discussion->user->avatar }}" style="width: 64px;height: 64px;">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $discussion->title }} <a class="btn btn-lg btn-primary pull-right" href="../../components/#navbar" role="button">修改帖子</a></h4>
                    {{ $discussion->user->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {{ $discussion->body }}
                </div>
            </div>
        </div>
    </div>
@stop
