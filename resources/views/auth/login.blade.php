@extends('layouts.main')

@section('content')

    <div class="panel panel-color panel-primary panel-pages" style="background-color: rgba(0, 0, 0, 0.65) !important;">
        <div class="panel-heading" style="background-color: transparent !important;">
            <h3 class="text-center m-t-10 text-white">Log in to <strong>{{config('blog.title')}}</strong></h3></div>
        <div class="panel-body" style="color:white !important;">
            <form class="form-horizontal m-t-20" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input name="Email" class="form-control input-lg" type="email"
                               placeholder="Email" value="{{ old('Email') }}">
                    </div>
                    @if ($errors->has('Email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('Password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" name="Password" type="password"
                               id="password" placeholder="Password">
                    </div>
                    @if ($errors->has('Password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-stable">
                            <input id="checkbox-signup" type="checkbox" name="remember" value="1">
                            <label for="checkbox-signup">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" style="    background-color: rgba(100, 71, 38, 0) !important;
    border: 1px solid #7d7171 !important;">Log In
                        </button>
                    </div>
                </div>
                <div class="form-group m-t-30">
                    <div class="col-sm-7"><a href="{{ url('/password/reset') }}" style="color:white !important;"><i class="fa fa-lock m-r-5"></i>
                            Forgot your password?</a></div>

                </div>
            </form>
        </div>
    </div>

@endsection