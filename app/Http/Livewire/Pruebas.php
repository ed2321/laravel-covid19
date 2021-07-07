<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prueba;

class Pruebas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_prueba, $id_tipo_prueba, $fecha_servicio, $fecha_resultado, $id_empresa, $id_paciente, $id_funcionario, $nro_servicio;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';hp
        return view('livewire.pruebas.view', [
            'pruebas' => Prueba::latest()
						->orWhere('id_prueba', 'LIKE', $keyWord)
						->orWhere('id_tipo_prueba', 'LIKE', $keyWord)
						->orWhere('fecha_servicio', 'LIKE', $keyWord)
						->orWhere('fecha_resultado', 'LIKE', $keyWord)
						->orWhere('id_empresa', 'LIKE', $keyWord)
						->orWhere('id_paciente', 'LIKE', $keyWord)
						->orWhere('id_funcionario', 'LIKE', $keyWord)
						->orWhere('nro_servicio', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_prueba = null;
		$this->id_tipo_prueba = null;
		$this->fecha_servicio = null;
		$this->fecha_resultado = null;
		$this->id_empresa = null;
		$this->id_paciente = null;
		$this->id_funcionario = null;
		$this->nro_servicio = null;
    }

    public function store()
    {
        $this->validate([
		'id_prueba' => 'required',
		'id_tipo_prueba' => 'required',
		'fecha_servicio' => 'required',
		'id_empresa' => 'required',
		'id_paciente' => 'required',
		'id_funcionario' => 'required',
        ]);

        Prueba::create([ 
			'id_prueba' => $this-> id_prueba,
			'id_tipo_prueba' => $this-> id_tipo_prueba,
			'fecha_servicio' => $this-> fecha_servicio,
			'fecha_resultado' => $this-> fecha_resultado,
			'id_empresa' => $this-> id_empresa,
			'id_paciente' => $this-> id_paciente,
			'id_funcionario' => $this-> id_funcionario,
			'nro_servicio' => $this-> nro_servicio
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Prueba Successfully created.');
    }

    public function edit($id)
    {
        $record = Prueba::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_prueba = $record-> id_prueba;
		$this->id_tipo_prueba = $record-> id_tipo_prueba;
		$this->fecha_servicio = $record-> fecha_servicio;
		$this->fecha_resultado = $record-> fecha_resultado;
		$this->id_empresa = $record-> id_empresa;
		$this->id_paciente = $record-> id_paciente;
		$this->id_funcionario = $record-> id_funcionario;
		$this->nro_servicio = $record-> nro_servicio;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_prueba' => 'required',
		'id_tipo_prueba' => 'required',
		'fecha_servicio' => 'required',
		'id_empresa' => 'required',
		'id_paciente' => 'required',
		'id_funcionario' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Prueba::find($this->selected_id);
            $record->update([ 
			'id_prueba' => $this-> id_prueba,
			'id_tipo_prueba' => $this-> id_tipo_prueba,
			'fecha_servicio' => $this-> fecha_servicio,
			'fecha_resultado' => $this-> fecha_resultado,
			'id_empresa' => $this-> id_empresa,
			'id_paciente' => $this-> id_paciente,
			'id_funcionario' => $this-> id_funcionario,
			'nro_servicio' => $this-> nro_servicio
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Prueba Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Prueba::where('id', $id);
            $record->delete();
        }
    }
}
