<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pruebas';

    protected $fillable = ['id_prueba','id_tipo_prueba','fecha_servicio','fecha_resultado','id_empresa','id_paciente','id_funcionario','nro_servicio'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id_empresa', 'id_empresa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function funcionario()
    {
        return $this->hasOne('App\Models\Funcionario', 'id_funcionario', 'id_funcionario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id_paciente', 'id_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPrueba()
    {
        return $this->hasOne('App\Models\TipoPrueba', 'id_tipo_prueba', 'id_tipo_prueba');
    }
    
}
