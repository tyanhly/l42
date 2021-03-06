
<?php $title="List Nerds"; ?>
@extends('layout.main')

@section('title', $title)

@section('content')
    <!-- Page Content -->
    <div class="container">

                <h1>{{$title}}</h1>
               
                <div class="row-fluid show-grid">
                    <div class="span12 " >
                       <form  class="form-inline form-search" method="get" action="{{ URL::to('nerds/')}}" name="quick-search"  >
                            <div class="form-group">
                                <label for="keywords">Keyword:</label>
                                <input type="text" value="{{ $keywords }}" 
                                name="keywords" id="keywords" class="form-control" placeholder="Search" />
                            </div>
                            <button class="btn btn-small btn-success" type="submit">
                                <i class="icon-search "></i> Search
                            </button>
                            <div class="pull-right">
                                <a href="{{ URL::to('nerds/create')}}" class="btn btn-small btn-info"> Create</a>
                            </div>
                        </form>
                        
                
                    </div>
                </div>
                
                <table class="table table-striped table-bordered">
                	<thead>
                		<tr>
                		      
                			<th>
                			<a class="header"  href="#" 
                                    data-oby='id' 
                                    data-ovalue="{{{ ($orderBy == 'id' && $orderValue=='DESC')?'ASC':'DESC' }}}">ID</a>
                            </th>
                			<th>
                			<a class="header"  href="#" 
                                    data-oby='name' 
                                    data-ovalue="{{{ ($orderBy == 'name' && $orderValue=='DESC')?'ASC':'DESC' }}}">Name</a>
                            </th>
                			<th>
                			<a class="header"  href="#" 
                                    data-oby='email' 
                                    data-ovalue="{{{ ($orderBy == 'email' && $orderValue=='DESC')?'ASC':'DESC' }}}">Email</a>
                            </th>
                			<th>
                			<a class="header"  href="#" 
                                    data-oby='nerd_level' 
                                    data-ovalue="{{{ ($orderBy == 'nerd_level' && $orderValue=='DESC')?'ASC':'DESC' }}}">Nerd Level</a>
                            </th>
                			<th width="400">Actions</th>
                		</tr>
                	</thead>
                	<tbody>
                	@foreach($nerds as $key => $value)
                	<?php $value = (object) $value; //dd($value);?>
                		<tr>
                			<td>
                			{{ $value->id }}</td>
                			<td>{{ $value->name }}</td>
                			<td>{{ $value->email }}</td>
                			<td>{{ $value->nerd_level }}</td>
                
                			<!-- we will also add show, edit, and delete buttons -->
                			<td>
                
                				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                				<!-- we will add this later since its a little more complicated than the first two buttons -->
                				{{ Form::open(array('url' => 'nerds/' . $value->id, 'class' => 'pull-right')) }}
                					{{ Form::hidden('_method', 'DELETE') }}
                					{{ Form::submit('Delete this Nerd', array('class' => 'btn btn-warning')) }}
                				{{ Form::close() }}
                
                				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                				<a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>
                
                				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                				<a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>
                
                			</td>
                		</tr>
                		
                	@endforeach
                </table>
                
                <div>
                    <div class="pull-left pagination-status">
                        {{ Form::select('vc', $perPageForm["perPageList"], $perPageForm["defaultPerPage"], array('id' => 'changeViewCount', 'class' => 'form-control')) }}
                    </div> <div class="pull-left pagination-status">
                        From {{$nerds->getFrom()}}
                        To {{$nerds->getTo()}}
                        Of {{$nerds->getTotal()}}</div>
                    <div class="pull-right">
                        
                	       {{$nerds->links(); }}
                	</div>
                	<div class="clear:both;"></div>
                </div>
            </div>
@stop

@section('script')

<script>

keywords = '{{ $keywords }}';    
fullHref = '{{ URL::full() }}';
$( '.pagination li a' ).each( function () {
	var perPage = $('#changeViewCount').children(':selected').val();
    var href = $(this).attr('href');
    href = href + '&keywords=' + escape(keywords) 
        + '&perPage=' + perPage ;
    $(this).attr('href', href);
});

$( '#changeViewCount' ).change( function () {
    var perPage = $(this).children(':selected').val();
    var href = fullHref;
    if(href.indexOf("?") > -1){
        href = href.replace(/&?perPage=[^\&]+/, '') + '&perPage=' + perPage;
    }else{
        href = href + '?perPage=' + perPage;
    }
    document.location.href = href ;
});

$(".header").click(function(){
	orderBy = $(this).attr('data-oby');
	orderValue = $(this).attr('data-ovalue');
	
    var href = fullHref;
    if(href.indexOf("?") > -1){
        href = href.replace(/&?orderBy=[^\&]+/, '');
        href = href.replace(/&?orderValue=[^\&]+/, '');
        href = href + '&orderBy=' + orderBy + '&orderValue=' + orderValue;
    }else{
        href = href + '?orderBy=' + orderBy + '&orderValue=' + orderValue;
    }
    document.location.href = href ;
});


	</script>
@stop

