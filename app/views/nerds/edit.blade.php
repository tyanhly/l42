
<?php $title="Edit" . $nerd->name; ?>
@extends('layout.main')

@section('title', $title)

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 ">
                <h1>{{$title}}</h1>

                    
                
                <!-- if there are creation errors, they will show here -->
                {{ HTML::ol($errors->all(), array('class' => "error")) }}
                
                {{ Form::model($nerd, array('action' => array('NerdController@update', $nerd->id), 'method' => 'PUT')) }}
                
                	<div class="form-group">
                		{{ Form::label('name', 'Name') }}
                		{{ Form::text('name', null, array('class' => 'form-control')) }}
                	</div>
                
                	<div class="form-group">
                		{{ Form::label('email', 'Email') }}
                		{{ Form::email('email', null, array('class' => 'form-control')) }}
                	</div>
                
                	<div class="form-group">
                		{{ Form::label('nerd_level', 'Nerd Level') }}
                		{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
                	</div>
                
                	{{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}
                
                {{ Form::close() }}
    
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop

@section('script')
@stop


