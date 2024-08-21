<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = "tarjetas";

    protected $primaryKey = 'id';

    protected $fillable = ['titulo','detalle','imagen','link','label_link','seccion_id'];

}
