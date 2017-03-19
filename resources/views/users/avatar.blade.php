@extends('app');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    @if(Auth::check())
                        <img src="/{{ Auth::user()->avatar }}" width="120" class="img-circle" alt="">
                        {!! Form::open(['url'=>'/avatar','files'=>true]) !!}
                        {!! Form::file('avatar') !!}
                        <div>
                            {!! Form::submit('上传头像',['class'=>'btn btn-primary  pull-right']) !!}
                        </div>
                        {!! Form::close() !!}
                    @else
                        <a href="/user/login" class="btn btn-block btn-success">请先登录</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@stop