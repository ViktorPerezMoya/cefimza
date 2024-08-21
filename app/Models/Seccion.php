<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seccion extends Model
{
    protected $table = 'secciones';

    protected $primaryKey = 'id';

    protected $fillable = ['titulo','subtitulo','contenido','imagen','in_menu','in_home','link','orden_menu','orden_home'];

    /**
     * Get the tarjetas for the blog post.
     */
    public function tarjetas(): HasMany
    {
        return $this->hasMany(Tarjeta::class,'seccion_id');
    }

    public function datos(): HasMany
    {
        return $this->hasMany(Dato::class,'seccion_id');
    }

    public function notas(): HasMany
    {
        return $this->hasMany(Nota::class,'seccion_id');
    }
}
