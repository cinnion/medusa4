@extends('layout')

@section('pageTitle')
    Terms of Service
@stop

@section('content')
    @include('partials.tos')
    {!! html()->form('POST')->route('tos')->open() !!}
    {!! html()->hidden('id', Auth::user()->id) !!}
    {!! html()->hidden('tos',1) !!}
    <div>By clicking "I Agree", you agree that you have read and understand the Terms of Service</div>
    <div>
        <a class="btn"
           href="{!! route('signout') !!}">I do not agree</a> {!! html()->submit('I Agree')->class('btn') !!}
    </div>
    {!! html()->form()->close() !!}
@stop
