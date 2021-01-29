@extends('connect.master')

@section('title','Registrarse')

@section('content')

<div class="box box_register shadow">
	<div class='header'>
		<a href="{{ url('/login') }}">
			<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/register']) !!}
		<label for="rfc" class="font-weight-bold">RFC</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user"></i></div>
		  </div>
		  {!! Form::text('rfc', null, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'VIRA9702024I9')) !!}
		</div>		
		<label for="name" class="font-weight-bold">Nombre</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user"></i></div>
		  </div>
		  {!! Form::text('name', null, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'Nombre')) !!}
		</div>

		<label for="lastname" class="font-weight-bold">Apellido</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user-tag"></i></div>
		  </div>
		  {!! Form::text('lastname', null, array('class ' => 'form-control text-inside', 'placeholder' => 'Apellidos')) !!}
		</div>		

		<label for="email" class="font-weight-bold">E-mail</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
		  </div>
		  {!! Form::email('email', null, array('class ' => 'form-control text-inside', 'placeholder' => 'email@duckybank.com'))!!}
		</div>

		<label for="password" class="font-weight-bold">Contraseña</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-lock"></i></div>
		  </div>
		  {!! Form::password('password', array('class ' => 'form-control text-inside', 'placeholder' => '$#/0%#$7$'))!!}
		</div>

		<label for="cpassword" class="font-weight-bold">Confirmar contraseña</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-lock"></i></div>
		  </div>
		  {!! Form::password('cpassword', array('class ' => 'form-control text-inside', 'placeholder' => '$#/0%#$7$'))!!}
		</div>
			{!! Form::submit('Registrarse', ['class' => 'btn-success-bta border-all-10 mtop16'])!!}
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
			<a href="{{ url('/login') }}">Ya tengo una cuenta, ingresar</a>
		</div>	
	</div>
	
</div>

@stop
