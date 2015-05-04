<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <!-- will be used to show any messages -->
            @if (Session::has('message'))
            	<div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        </div>
    </div>
</div>
    