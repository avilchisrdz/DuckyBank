@extends('cashieradmin.masterpage')

@section('breadcrumb')
	<li class="breadcrumb-item">
	  <a href="{{ url('/admin') }}"><i class="far fa-folder-open"></i> Dashboard</a>
	</li>
@endsection	

@section('content')
<!-- Here I put the dashboard content-->
<div class="row">
	<section class="col-lg-7 connectedSortable ui-sortable">
		<div style=""></div>
		
	</section>
	<section class="col-lg-5 connectedSortable ui-sortable">
		
	</section>	
</div>
@endsection