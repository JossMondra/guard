<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";
    protected $primaryKey = 'id_persona';
    protected $fillable=["id_persona","nom","ap","am","fecha_nac"];
    public $timestamps = false;
}