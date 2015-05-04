
<?php $title="Showing " . $nerd->name; ?>
@extends('layout.main')

@section('title', $title)

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 ">
                <h1>{{$title}}</h1>

            	<div class="jumbotron text-center">
            		<h2>{{ $nerd->name }}</h2>
            		<p>
            			<strong>Email:</strong> {{ $nerd->email }}<br>
            			<strong>Level:</strong> {{ $nerd->nerd_level }}
            		</p>
            	</div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop

@section('script')
@stop


