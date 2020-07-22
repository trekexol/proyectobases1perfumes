<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    protected $table = 'origen';
    protected $primaryKey = false;
    public $incrementing = false;
    public $filleable = ['id_pais', 'id_materia'];
    public $timestamps = false;
}
