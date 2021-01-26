@extends('connect.master')

@section('title','Login')

@section('content')
	<div class="box box-login shadow">
		<div class='header'>
			<a href="{{ url('/login') }}">
				<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
			</a>
		</div>

		<div class="inside">
			{!! Form::open(['url' => '/login']) !!}
			<label for="email" class="font-weight-bold">E-mail</label>
			<div class="input-group">
			  	<div class="input-group-prepend">
			    	<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
			  	</div>
			  {!! Form::email('email', null, array('class ' => 'form-control text-inside', 'placeholder' => 'email@duckybank.com'))!!}
			</div>

			<label for="password" class="mtop16 font-weight-bold">Password</label>
			<div class="input-group">
			  	<div class="input-group-prepend">
			    	<div class="input-group-text"><i class="fas fa-lock"></i></div>
			  </div>
			  {!! Form::password('password', array('class ' => 'form-control text-inside', 'placeholder' => '$#/0%#$7$'))!!}
			</div>

			{!! Form::submit('Ingresar', ['class' => 'btn-success-bta border-all-10 mtop16'])!!}
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
				<a href="{{ url('/register') }}">Registrarse</a>
				<a href="{{ url('/recover') }}">Recuperar</a>
			</div>	
		</div>		

	</div>
@stop