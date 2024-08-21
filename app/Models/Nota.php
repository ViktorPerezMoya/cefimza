<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = "informes";

    protected $primaryKey = 'id';

    protected $fillable = ['titulo','autor','fecha','imagen','resumen','contenido','visible'];
}
