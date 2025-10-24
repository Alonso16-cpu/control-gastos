<?php
namespace App\services;

class AIServicio{
public function analizarSentimiento (string $descripcion):string
    {
        $texto=strtolower($descripcion);
        //Patrones negativos (Gasto, inesperado, reparacion)
        if(str_contains($texto,'reparacion') ||
        str_contains($texto, 'averia')||
        str_contains($texto, 'multa')||
        str_contains($texto, 'urgente')||
        str_contains($texto, 'impuesto')||
        str_contains($texto, 'roto')){
            return 'negativo';

        }
        //Patrones positivos(ocio, recompensa, inversion)
        if(str_contains($texto,'pizza') ||
        str_contains($texto, 'regalo')||
        str_contains($texto, 'viaje')||
        str_contains($texto, 'cena')||
        str_contains($texto, 'inversion')||
        str_contains($texto, 'curso')){
            return 'positivo';
        }
        //Caso Neutro(Descripciones basicas o descrpiciones muy genericas)
        return 'neutro';
    }
    public function predecirTipoGasto(string $descripcion, float $monto):string
    {
        $texto=strtolower($descripcion);
        //Reglas de necesario(Gastos comunes, vivienda, salud)
        if(str_contains($texto, 'supermercado')||
            str_contains($texto, 'alquiler')||
            str_contains($texto, 'farmacia')||
            str_contains($texto, 'electricidad')){
                return 'Necesario';
            }
            //Reglas de innecesario(Lujos, ocio, caro)
            if(str_contains($texto, 'entretenimiento')||
            str_contains($texto, 'lujo')||
            ($monto > 500 && str_contains($texto, 'compra')))
            {
                return 'Innecesario';
            }
            return 'sin predecir';
        
    }
}
