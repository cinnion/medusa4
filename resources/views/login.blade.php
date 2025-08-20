@extends('layout')

@section('pageTitle')
    Welcome!
@stop

@section('content')
    @if( !Auth::check() )
        <div class="login-form row">
            <div class="col-sm-6 small-centered ">
                <h4 class="NordItalic">Sign In</h4>
                {!! html()->form('POST')->route('signin') !!}
                {!! html()->label( 'email', 'Email' ) !!} {!! html()->email( 'email' ) !!}
                {!! html()->label( 'password', 'Password' ) !!} {!! html()->password( 'password' ) !!}
                {!! html()->submit( 'Sign in now', [ 'class' => 'btn right reg-button' ] ) !!}
                {!! html()->form()->close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 small-centered ">
                <a href="{{ route('password.request') }}" class="right"><p
                            style="font-style: italic">Forgot your password dummy?</p></a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 small-centered ">
                <p style="font-style: italic" class="right">Not a member? Register here!</p><br clear="right">
                <a href="{!! URL::route( 'register' ) !!}" class="btn right reg-button">Register</a>
            </div>
        </div>
    @endif

@stop
