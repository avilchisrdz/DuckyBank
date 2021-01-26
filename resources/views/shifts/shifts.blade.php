@extends('connect.master')

@section('title','Registrarse')

@section('content')

<div class="box box_register shadow">
	<div class='header'>
		<a href="{{ url('/sender') }}">
			<img src="{{asset('assets/img/brazeway-1Xx1X.png')}}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/shift']) !!}
		<label for="name" class="font-weight-bold">Nombre</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user"></i></div>
		  </div>
		  {!! Form::text('name', null, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'Escribe tu nombre')) !!}
		</div>

		<label for="station" class="font-weight-bold">Estación</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user-tag"></i></div>
		  </div>
		  {!! Form::text('station', null, array('class ' => 'form-control text-inside', 'placeholder' => 'Cu2')) !!}
		</div>		

		<label for="ip" class="font-weight-bold">IP</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
		  </div>
		  {!! Form::text('ip', null, array('class ' => 'form-control text-inside', 'placeholder' => '010.050.001.000'))!!}
		</div>


		<label for="description" class="font-weight-bold">Descripción</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
		  </div>
		  {!! Form::text('description', null, array('class ' => 'form-control text-inside', 'placeholder' => 'Escribe el problema'))!!}
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
							//$('.alert').slideDown(); 
							//setTimeout( function(){ $('.alert').slideUp();}, 5000);
							$('.alert').slideDown(1000); 
							window.setTimeout(function() { $(".alert").slideUp(1000); }, 5000);	
						</script>
					</div>
				</div>
			@endif

		<div class="font-weight-bold footer mtop16">
			<a href="{{ url('/login') }}">Ingresar con otro usuario</a>
		</div>	
	</div>
	
</div>

@stop
