<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    protected $table = 'contacto';
    protected $primaryKey = 'codigo';
    public $filleable = ['numero_telefono', 'id_productor', 'id_proveedor'];
    public $timestamps = false;
}
