@extends('shift.master')


@section('title','Solicitar Turno')

@section('content')

<div class="box box-dimenshift shadow">
	<div class='header'>
		<a href="{{ url('/shiftsshow') }}">
			<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
		</a>
	</div>
	<div class="inside">
		<div class="box shadow shiftshow">
			<h1>SU TURNO ES:</h1>
			@if(Session::has('message'))
				<div class="container mtop16">
					<div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
						{{ Session::get('message')}}
						@if( $errors->any() )
						<ul>
							@foreach( $errors->all() as $error )
							<li>{{ $error }}</li>
							@endforeach
						</ul>
						@endif
					</div>
				</div>
			@endif			
		</div>

	</div>
	<div class="footer" style="font-weight: bold; font-size: 0.85rem;">
		Tiempo aproximado de espera >[1 minuto].
	</div>	
</div>

<script> 
	$('.alert').slideDown(1000); 
	setTimeout(function() { 
		$(".alert").slideUp(1000);
		window.location.href = "/shifts";
	}, 7000);	
</script>

@stop
