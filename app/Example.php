<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'Example';
    protected $primaryKey = 'pk';
    public $filleable = ['name', 'lastname', 'fecha_nacimiento'];
}
