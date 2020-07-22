<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renovacion extends Model
{
    protected $table = 'renovacion';
    protected $primaryKey = 'id';
    public $filleable = ['id_contrato','fecha'];

    public $timestamps = false;
} 