@extends('admin.masterpage')

@section('breadcrumb')
	<li class="breadcrumb-item">
	  <a href="{{ url('/admin/users') }}"><i class="far fa-folder-open"></i> Editar usuario</a>
	</li>
@endsection	

@section('content')
<!-- Here I put the dashboard content-->
<div class="container-fluid">
<div class="row">
	<section class="col-md-4 connectedSortable ui-sortable">
		<div class="box card shadow footer-line">
			<div class="card-header">Editar usuario</div>
			<div class="card-body">
				<div class="inside">
					{!! Form::open(['url' => '/admin/user/'.$userCatch->id.'/edit']) !!}				
					<label for="rfc" class="font-weight-bold">RFC</label>
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text"><i class="fas fa-user"></i></div>
					  </div>
					  {!! Form::text('rfc', $userCatch->rfc, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'VIRA9702024I9')) !!}
					</div>		
					<label for="name" class="font-weight-bold">Nombre</label>
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text"><i class="fas fa-user"></i></div>
					  </div>
					  {!! Form::text('name', $userCatch->name, array('class ' => 'form-control text-inside', 'required' , 'placeholder' => 'Nombre')) !!}
					</div>

					<label for="lastname" class="font-weight-bold">Apellido</label>
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text"><i class="fas fa-user-tag"></i></div>
					  </div>
					  {!! Form::text('lastname', $userCatch->lastname, array('class ' => 'form-control text-inside', 'placeholder' => 'Apellidos')) !!}
					</div>		

					<label for="email" class="font-weight-bold">E-mail</label>
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
					  </div>
					  {!! Form::email('email', $userCatch->email, array('class ' => 'form-control text-inside', 'placeholder' => 'email@duckybank.com'))!!}
					</div>
					<label for="role_id" class="font-weight-bold">Role</label>
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<div class="input-group-text"><i class="fas fa-user"></i></div>
					  </div>
					  {!! Form::select('role_id',getArrayRoles(),0,array('class' => 'custom-select text-inside')) !!}	
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
					{{ Form::submit('Guardar', [ 'class' => 'btn-success-btb border-all-10 mtop16' ]) }}					
					{!! Form::close() !!}
				</div>			
			</div>
			<div class="card-footer">FOOTER</div>
		</div>
		<a class="shadow btn-success-btb border-all-10 d-flex" style="text-align: center;" href="/admin/users/1">Agregar Usuario</a>
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
									<td class="table-titles" >RFC</td>
									<td class="table-titles" >Nombre</td>
									<td class="table-titles" >Apellido</td>
									<td class="table-titles" >Role</td>
									<td class="table-titles" >Estado</td>
									<td class="table-titles" >Fecha</td>
									<td class="table-titles"  width="100">Acciones</td>
								</tr>
							</thead>
							<tbody>
								@foreach($usersCatch as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->rfc }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->lastname }}</td>
									<td>{{ $user->role_id }}</td>
									<td>{{ $user->user_status_id }}</td>
									<td>{{ $user->created_at }}</td>
									<td>
										<div class="the-options">
											<a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i>
											</a>
											<a href="{{ url('/admin/user/'.$user->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i>
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