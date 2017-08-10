@extends('layouts.main')

@section('content')

    <div class="panel panel-color panel-primary panel-pages" style="background-color: rgba(0, 0, 0, 0.65) !important;">
        <div class="panel-heading" style="background-color: transparent !important;">
            <h3 class="text-center m-t-10 text-white">Reset Password</h3></div>
        <div class="panel-body" style="color:white !important;">
            <form class="form-horizontal m-t-20" method="POST" action="{{ url('/password/reset') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input name="email" class="form-control input-lg" type="email" required="required"
                               placeholder="Email Address" value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" name="password" type="password" required="required"
                               id="password" placeholder="Password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control input-lg" name="password_confirmation" type="password" required="required"
                               id="password_confirmation" placeholder="Confirm Password">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" style="    background-color: rgba(100, 71, 38, 0) !important;
    border: 1px solid #7d7171 !important;"> Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection