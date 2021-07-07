@section('title', __('Pruebas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Prueba Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Pruebas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Pruebas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.pruebas.create')
						@include('livewire.pruebas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Prueba</th>
								<th>Id Tipo Prueba</th>
								<th>Fecha Servicio</th>
								<th>Fecha Resultado</th>
								<th>Id Empresa</th>
								<th>Id Paciente</th>
								<th>Id Funcionario</th>
								<th>Nro Servicio</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($pruebas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_prueba }}</td>
								<td>{{ $row->id_tipo_prueba }}</td>
								<td>{{ $row->fecha_servicio }}</td>
								<td>{{ $row->fecha_resultado }}</td>
								<td>{{ $row->id_empresa }}</td>
								<td>{{ $row->id_paciente }}</td>
								<td>{{ $row->id_funcionario }}</td>
								<td>{{ $row->nro_servicio }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Prueba id {{$row->id}}? \nDeleted Pruebas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $pruebas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>