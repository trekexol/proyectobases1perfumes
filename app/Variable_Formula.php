<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable_Formula extends Model
{
    protected $table = 'variable_formula';
    protected $primaryKey = 'fecha_inicial';
    public $filleable = ['id_variable', 'id_productor', 'peso', 'tipo_formula', 'fecha_inicial'];
    public $timestamps = false;
 
    
    public function scopeVigente($query, $id_productor)
    {
        //retorna todas las formulas de un productor iniciales o renovacion cuando estan vigentes
        return $query->where('id_productor', '=', $id_productor)->whereNull('fecha_final');
    }

    public function scopeFinalizadas($query, $id_productor)
    {   
        //retorna todas las formulas de un productor cuando esta finalizada
        return $query->where('id_productor', '=', $id_productor)->where('fecha_final', '!=', '');
    }

    public function scopeTodas($query, $id_productor)
    {   
        //retorna todas las formulas de un productor
        return $query->where('id_productor', '=', $id_productor);
    }

}
