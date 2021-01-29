@extends('shift.master')

@section('title','Solicitar Turno')

@section('content')

<div class="box box-dimenshift shadow">
	<div class='header'>
		<a href="{{ url('/shifts') }}">
			<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/shifts']) !!}
		<h1 style="font-weight: bold; font-size: 3rem; color: #E400FF;">Bienvenido</h1>
		<h1 style="font-weight: bold; font-size: 1rem; color: #434343;">¡Gracias por elegir Ducky Bank!</h1>
		<h3 class="mtop22">Seleccione su trámite, por favor:</h3>
		<div class="input-group">
		    <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">
			    	<i class="far fa-keyboard"></i>
			    </span>
		    </div>
		  {!! Form::select('selectshift',getArrayProcedures(),0,array('class' => 'custom-select text-inside')) !!}			  		  	  
		</div>

			{!! Form::submit('Solicitar', ['class' => 'btn-success-bta border-all-10 mtop16'])!!}
			{!! Form::close() !!}	

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
						<script> 
							$('.alert').slideDown(1000); 
							window.setTimeout(function() { $(".alert").slideUp(1000); }, 5000);	
						</script>
					</div>
				</div>
			@endif

	</div>
	<div class="footer" style="font-weight: bold; font-size: 0.85rem;">
		Después de elegir su trámite, por favor, clic al botón [Solicitar], gracias!
	</div>
	
</div>

@stop
