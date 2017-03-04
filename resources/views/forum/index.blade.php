@extends('app')
@section('content')

    <div class="jumbotron">
       <div class="container">
           <h2>
               欢迎来到 teaman社区
               <a class="btn btn-lg btn-primary pull-right" href="/discussions/create" role="button">发布新的帖子</a>
           </h2>
       </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="{{ $discussion->user->avatar }}" alt="" class="media-object img-circle" alt="64x64" style="width: 64px;height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"> <a href="/discussions/{{ $discussion->id }}">{{ $discussion->title }}</a></h4>
                            {{ $discussion->user->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
