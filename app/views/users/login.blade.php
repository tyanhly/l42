<?php $title= 'Login';?>
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
				<div class="alert alert-error alert-danger">{{{
					Session::get('error') }}}</div>
				@endif @if (Session::get('notice'))
				<div class="alert alert-success">{{{ Session::get('notice') }}}</div>
				@endif
				<form role="form" method="POST"
					action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
					<input type="hidden" name="_token"
						value="{{{ Session::getToken() }}}">
					<fieldset>
						<div class="form-group">
							<label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
							<input class="form-control" tabindex="1"
								placeholder="{{{ Lang::get('confide::confide.e_mail') }}}"
								type="text" name="email" id="email"
								value="{{{ Input::old('email') }}}">
						</div>
						<div class="form-group">
							<label for="password"> {{{ Lang::get('confide::confide.password')
								}}} </label> <input class="form-control" tabindex="2"
								placeholder="{{{ Lang::get('confide::confide.password') }}}"
								type="password" name="password" id="password">
							
						</div>
						<div class="checkbox">
							<label for="remember"> <input tabindex="4" type="checkbox"
								name="remember" id="remember" value="1"> {{{
								Lang::get('confide::confide.login.remember') }}}
							</label>
							<p style="float:right;">
								<a href="{{{ URL::to('/users/forgot_password') }}}">{{{
									Lang::get('confide::confide.login.forgot_password') }}}</a>
							</p>
							<div style="clear:both;"></div>
						</div>
						
						<div class="form-group">
							<button tabindex="3" type="submit" class="btn btn-success">{{{
								Lang::get('confide::confide.login.submit') }}}</button>
						</div>
					</fieldset>
				</form>

			</div>
		</div>
	</div>



</div>
</div></div></div></div>

