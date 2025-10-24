<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gasto extends Model
{
    protected $fillable = [
        'monto', 
        'descripcion', 
        'fecha', 
        'categoria_id', 
        'analisis-sentimiento',
        'prediccion_ia'];
    public function categoria():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }
}
