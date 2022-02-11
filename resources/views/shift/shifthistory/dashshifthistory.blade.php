@extends('shift.master')

@section('title','Solicitar Turno')

@section('content')

<div id="hist" class="container-fluid">
		<div class="box card shadow">
			<div class="header">
				<a href="{{ url('/shiftshistories') }}">
					<img src="{{asset('assets/images/DuckyBankLogo.png')}}">
					<h1 style="text-align: center;">HISTORIAL DE TURNOS</h1>
				</a>		
			</div>
			<div class="card-body">
				
				<div class="inside">
					<nav class="nav nav-pills nav-fill">
					</nav>
					<div class="table-responsive">
						<table class="table mtop16">
							<thead class="table table-sm">
								<tr>
									<td class="table-titles" style="font-size: 2rem; text-align: center;" width="600">Turno</td>
									<td class="table-titles" style="font-size: 2rem; text-align: center;" >Fecha</td>
								</tr>
							</thead>
							<tbody id="id_shifthistories">
								@foreach($shiftHistoriesCatch as $shifthistory)
								<tr>
									<td class="shadow" style="font-size: 1.9rem; font-weight: bold; text-align: center;">{{ $shifthistory->description }}</td>
									<td style="font-size: 1.9rem; font-weight: bold; text-align: center;">{{ $shifthistory->created_at }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>								
					</div>				
				</div>			

			</div>
			<div class="card-footer">HISTORIAL DE TURNOS</div>
		</div>
</div>
<script>

var shiftSizeOld=0;
	
setInterval(function(){

	$.ajax({
		type: "GET",
		url: 'consult_shifts',
		data: "1",
		cache: false,
		success: function (info) {

			var data = JSON.parse(info);

			if(shiftSizeOld != data.shiftSize){
				if (data.shiftSize > 0) {
					document.getElementById("id_shifthistories").innerHTML = data.shiftHistoriesCatch;
				}
				shiftSizeOld=data.shiftSize;				
			}

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			//console.log(arguments);
		},
	});	

},1000);




</script>	
@stop
