@extends('admin.masterpage')

@section('breadcrumb')
	<li class="breadcrumb-item">
	  <a href="{{ url('/admin/userstatus') }}"><i class="far fa-folder-open"></i> Editar estado</a>
	</li>
@endsection	

@section('content')
<!-- Here I put the dashboard content-->
<div class="container-fluid">
<div class="row">
	<section class="col-md-4 connectedSortable ui-sortable">
		<div class="box card shadow footer-line">
			<div class="card-header">Editar estado</div>
			<div class="card-body">
				<div class="inside">
					{!! Form::open(['url' => '/admin/userstatus/'.$userStatusCatch->id.'/edit']) !!}				
					<label for="description">Ingresa estado:</label>
						<div class="input-group">
						    <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1">
							    	<i class="far fa-keyboard"></i>
							    </span>
						    </div>
							{!! Form::text('description', $userStatusCatch->description, array('class ' => 'form-control text-inside', 'placeholder' => 'Estado')) !!}
						</div>																						
					{{ Form::submit('Guardar', [ 'class' => 'btn-success-btb border-all-10 mtop16' ]) }}					
					{!! Form::close() !!}
				</div>			
			</div>
			<div class="card-footer">FOOTER</div>
		</div>
		<a class="shadow btn-success-btb border-all-10 d-flex" style="text-align: center;" href="/admin/userstatuses/1">Agregar Estado</a>
	</section>
	
	<section class="col-md-8 connectedSortable ui-sortable">
		<div class="box card shadow footer-line">
			<div class="card-body">
				<div class="shadow border-all-10" style="font-weight: bold; text-align: center; background-color: #4A96FF">Estado de Usuario</div>
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
								@foreach($userStatusesCatch as $userstatus)
								<tr>
									<td>{{ $userstatus->id }}</td>
									<td>{{ $userstatus->description }}</td>
									<td >{{ $userstatus->created_at }}</td>
									<td>
										<div class="the-options">
											<a href="{{ url('/admin/userstatus/'.$userstatus->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i>
											</a>
											<a href="{{ url('/admin/userstatus/'.$userstatus->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i>
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