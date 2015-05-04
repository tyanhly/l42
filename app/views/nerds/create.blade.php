<?php $title="Create a Nerd"; ?>
@extends('layout.main')

@section('title', $title)

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 ">
                <h1>{{$title}}</h1>

                    <!-- if there are creation errors, they will show here -->
                {{ HTML::ol($errors->all(), array('class' => "alert alert-danger")) }}
                    
                    {{ Form::open(array('url' => 'nerds')) }}
                    
                    	<div class="form-group">
                    		{{ Form::label('name', 'Name') }}
                    		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                    	</div>
                    
                    	<div class="form-group">
                    		{{ Form::label('email', 'Email') }}
                    		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                    	</div>
                    
                    	<div class="form-group">
                    		{{ Form::label('nerd_level', 'Nerd Level') }}
                    		{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
                    	</div>
                    
                    	{{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop

@section('script')
@stop


