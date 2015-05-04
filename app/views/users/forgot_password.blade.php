<?php $title= 'Forget Password';?>
@extends('layout.guest')

@section('title', $title)

@section('content')

<div class="container">


	<div class="omb_login">
		<h3 class="omb_authTitle">
			{{$title}}
		</h3>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
			
    @if (Session::get('error'))
        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
    @endif
<form method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
        <div class="input-append input-group">
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            <span class="input-group-btn">
                <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
            </span>
        </div>
    </div>

</form>
</div></div></div></div>
