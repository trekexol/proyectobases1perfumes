<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table = 'pais';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $filleable = ['nombre'];

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre', 'LIKE', "%$name%");
        }
    }
}
