<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prohibido extends Model
{
    protected $table = 'prohibido';
    protected $primaryKey = 'tsca_cas';
    public $filleable = ['nombre'];
    public $timestamps = false;
} 