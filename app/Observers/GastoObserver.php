<?php

namespace App\Observers;

use App\Models\Gasto;
use App\services\AIServicio;

class GastoObserver
{
    /**
     * Handle the Gasto "created" event.
     */
    protected AIServicio $aiservicio;
    public function __construct(AIServicio $aiservicio)
    {
        $this -> aiservicio = $aiservicio;
    }

    public function saving(Gasto $gasto):void{
        if(filled($gasto->descripcion)&&filled($gasto->monto)){
            //Analiza los sentimientos
            $sentimiento = $this->aiservicio->analizarSentimiento($gasto->descripcion);
            $gasto->analisis_sentimiento=$sentimiento;

            //Prediccion del tipo gasto
            $prediccion= $this->aiservicio->predecirTipoGasto($gasto->descripcion,$gasto->monto);
            $gasto->prediccion_ia = $prediccion;
        }else{
            $gasto->analisis_sentimiento = 'sin analisis';
            $gasto->prediccion_ia = 'sin prediccion';
        }
    }

    public function created(Gasto $gasto): void
    {
        //
    }

    /**
     * Handle the Gasto "updated" event.
     */
    public function updated(Gasto $gasto): void
    {
        //
    }

    /**
     * Handle the Gasto "deleted" event.
     */
    public function deleted(Gasto $gasto): void
    {
        //
    }

    /**
     * Handle the Gasto "restored" event.
     */
    public function restored(Gasto $gasto): void
    {
        //
    }

    /**
     * Handle the Gasto "force deleted" event.
     */
    public function forceDeleted(Gasto $gasto): void
    {
        //
    }
}
