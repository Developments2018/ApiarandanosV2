<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function afp()
    {
        return $this->belongsTo(Afp::class);
    }

    public function civil()
    {
        return $this->belongsTo(Civil::class);
    }

    public function contract_type()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function health()
    {
        return $this->belongsTo(Health::class);
    }

    public function salud()
    {
        return $this->belongsTo(Salud::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getAfpNombreafpAttribute(){
        if ($this->afp)
            return $this->afp->nombre_afp;
            return 'sin afp';
        }

    public function getCivilEstadocivilAttribute(){
    if ($this->civil)
        return $this->civil->estado_civil;
        return 'sin estado civil';
    }

    public function getContractTypeNombrecontratoAttribute(){
        if ($this->contract_type)
            return $this->contract_type->nombrecontrato;
            return 'sin contrato';
        }

        public function getHealthAlergiaAttribute(){
            if ($this->health)
                return $this->health->nombre_alergia;
                return 'sin alergia';
            }

    public function getSaludNombresaludAttribute(){
        if ($this->salud)
            return $this->salud->nombre_salud;
            return 'sin Salud especificado';
        }

        public function getWorkerRutAttribute(){
            if ($this->worker)
                return $this->worker->rut;
                return 'sin rut especificado';
            }

            public function getWorkerNombreAttribute(){
                if ($this->worker)
                    return $this->worker->nombre;
                    return 'sin nombre especificado';
                }

            public function getWorkerApellidosAttribute(){
                    if ($this->worker)
                        return $this->worker->apellidos;
                        return 'sin apellidos especificado';
                    }

     
}


