<?php

namespace MyControl;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    public function medioPago() {
        return $this->belongsTo('MyControl\Medio_pago', 'medio_pago_id');
    }

    public function tipo() {
        return $this->belongsTo('MyControl\Tipo_incidencia', 'tipo_incidencia_id');
    }

}
