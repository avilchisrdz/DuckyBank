@extends('connect.master')

@section('title','Recover')

@section('content')

<div class="box box_register shadow">
	<div class='header'>
		<a href="{{ url('/recover') }}">
			<img src="{{asset('assets/img/DuckyBankLogo.png')}}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/recover']) !!}
		<label for="email" class="font-weight-bold">E-mail asociado</label>
		<div class="input-group">
		  	<div class="input-group-prepend">
		    	<div class="input-group-text"><i class="fas fa-user"></i></div>
		  </div>
		  {!! Form::email('email', null, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'Ingresa tu e-mail asociado')) !!}
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
			<a href="{{ url('/login') }}">Regresar a iniciar sesión</a>
		</div>	
	</div>
	
</div>

@stop
