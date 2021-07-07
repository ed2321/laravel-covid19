<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departamento;

class Departamentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_departamento, $nombre_departamento;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.departamentos.view', [
            'departamentos' => Departamento::latest()
						->orWhere('id_departamento', 'LIKE', $keyWord)
						->orWhere('nombre_departamento', 'LIKE', $keyWord)
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
		$this->id_departamento = null;
		$this->nombre_departamento = null;
    }

    public function store()
    {
        $this->validate([
		'id_departamento' => 'required',
		'nombre_departamento' => 'required',
        ]);

        Departamento::create([ 
			'id_departamento' => $this-> id_departamento,
			'nombre_departamento' => $this-> nombre_departamento
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Departamento Successfully created.');
    }

    public function edit($id)
    {
        $record = Departamento::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_departamento = $record-> id_departamento;
		$this->nombre_departamento = $record-> nombre_departamento;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_departamento' => 'required',
		'nombre_departamento' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Departamento::find($this->selected_id);
            $record->update([ 
			'id_departamento' => $this-> id_departamento,
			'nombre_departamento' => $this-> nombre_departamento
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Departamento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Departamento::where('id', $id);
            $record->delete();
        }
    }
}
