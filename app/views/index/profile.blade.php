@extends('layout.main')

@section('title', 'About')

@section('content')


<div class="container">
    

    <div class="omb_login">
    	<h3 class="omb_authTitle">Profile </a></h3>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 ">
			    <pre>
			    Username: {{ Confide::user()->username }}
			    Email: {{ Confide::user()->email }}
			    
			    </pre>
			</div>
    	</div>	
	</div>
</div>


@stop

@section('script')
@stop

        




