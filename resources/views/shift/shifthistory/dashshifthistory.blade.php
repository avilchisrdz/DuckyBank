@extends('shift.master')

@section('title','Solicitar Turno')

@section('content')

<div class="container-fluid">
		<div class="box card shadow">
			<div class="header">
				<a href="{{ url('/shiftshistories') }}">
					<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
					<h1 style="text-align: center;">HISTORIAL DE TURNOS</h1>
				</a>		
			</div>
			<div class="card-body">
			<script type="text/javascript">
				$(document)..ready(function() {
			      	var refreshId =  setInterval( function(){ $('#clicking').load('dishshifthistory.blade.php'); }, 200 );
				});		  
			</script>				
				<div id="clicking" class="inside">
					<nav class="nav nav-pills nav-fill">
					</nav>
					<div class="table-responsive">
						<table class="table mtop16">
							<thead class="table table-sm">
								<tr>
									<td class="table-titles" width="600">Turno</td>
									<td class="table-titles" >Fecha</td>
								</tr>
							</thead>
							<tbody>
								@foreach($shiftHistoriesCatch as $shifthistory)
								<tr>
									<td class="shadow" style="font-size: 1.5rem; font-weight: bold">{{ $shifthistory->description }}</td>
									<td >{{ $shifthistory->created_at }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>								
					</div>				
				</div>			

			</div>
			<div class="card-footer">HISTORIAL DE TURNOS</div>
		</div>	
@stop
