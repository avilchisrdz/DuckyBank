@extends('admin.masterpage')

@section('breadcrumb')
	<li class="breadcrumb-item">
	  <a href="{{ url('/admin/configurations/users') }}"><i class="far fa-folder-open"></i> User Edit</a>
	</li>
@endsection	

@section('content')
<!-- Here I put the dashboard content-->
@endsection