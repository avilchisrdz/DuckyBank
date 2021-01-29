@extends('admin.masterpage')

@section('breadcrumb')
	<li class="breadcrumb-item">
	  <a href="{{ url('/admin/cashiers') }}"><i class="far fa-folder-open"></i> Cajeros</a>
	</li>
@endsection	

@section('content')
<!-- Here I put the dashboard content-->
<div class="container-fluid">
<div class="row">
	<section class="col-md-4 connectedSortable ui-sortable">
		<div style=""></div>
		<div class="box card shadow footer-line">
			<div class="card-header">Agregar cajero</div>
			<div class="card-body">
				<div class="inside">
					{!! Form::open(['url' => '/admin/cashier/add']) !!}
					<label for="description">Ingresa cajero:</label>
						<div class="input-group">
						    <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1">
							    	<i class="far fa-keyboard"></i>
							    </span>
						    </div>
							{!! Form::text('description', null, array('class ' => 'form-control text-inside', 'placeholder' => 'Cajero')) !!}
						</div>																						
					{{ Form::submit('Agregar', [ 'class' => 'btn-success-btb border-all-10 mtop16' ]) }}					
					{!! Form::close() !!}
				</div>			
			</div>
			<div class="card-footer">FOOTER</div>
		</div>
	</section>
	
	<section class="col-md-8 connectedSortable ui-sortable">
		<div class="box card shadow footer-line">
			<div class="card-body">
				<div class="shadow border-all-10" style="font-weight: bold; text-align: center; background-color: #4A96FF">Cajeros</div>
				<div class="inside">
					<nav class="nav nav-pills nav-fill">
					</nav>
					<div class="table-responsive">
						<table class="table mtop16">
							<thead class="table table-sm">
								<tr>
									<td class="table-titles" width="50">id</td>
									<td class="table-titles" >Descripción</td>
									<td class="table-titles" >Fecha</td>
									<td class="table-titles"  width="100">Acciones</td>
								</tr>
							</thead>
							<tbody>
								@foreach($cashiersCatch as $cashier)
								<tr>
									<td>{{ $cashier->id }}</td>
									<td>{{ $cashier->description }}</td>
									<td >{{ $cashier->created_at }}</td>
									<td>
										<div class="the-options">
											<a href="{{ url('/admin/cashier/'.$cashier->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i>
											</a>
											<a href="{{ url('/admin/cashier/'.$cashier->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i>
											</a>								
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>							
					</div>				
				</div>

			</div>
		</div>
	</section>	
</div>	
</div>
@endsection