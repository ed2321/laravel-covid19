<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Prueba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_prueba"></label>
                <input wire:model="id_prueba" type="text" class="form-control" id="id_prueba" placeholder="Id Prueba">@error('id_prueba') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_tipo_prueba"></label>
                <input wire:model="id_tipo_prueba" type="text" class="form-control" id="id_tipo_prueba" placeholder="Id Tipo Prueba">@error('id_tipo_prueba') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_servicio"></label>
                <input wire:model="fecha_servicio" type="text" class="form-control" id="fecha_servicio" placeholder="Fecha Servicio">@error('fecha_servicio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_resultado"></label>
                <input wire:model="fecha_resultado" type="text" class="form-control" id="fecha_resultado" placeholder="Fecha Resultado">@error('fecha_resultado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_empresa"></label>
                <input wire:model="id_empresa" type="text" class="form-control" id="id_empresa" placeholder="Id Empresa">@error('id_empresa') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_paciente"></label>
                <input wire:model="id_paciente" type="text" class="form-control" id="id_paciente" placeholder="Id Paciente">@error('id_paciente') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_funcionario"></label>
                <input wire:model="id_funcionario" type="text" class="form-control" id="id_funcionario" placeholder="Id Funcionario">@error('id_funcionario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nro_servicio"></label>
                <input wire:model="nro_servicio" type="text" class="form-control" id="nro_servicio" placeholder="Nro Servicio">@error('nro_servicio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>