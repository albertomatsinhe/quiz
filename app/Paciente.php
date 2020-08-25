<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //

    protected $table = 'pacientes';

    public function getAll()
    {
        return $this->select('pacientes.*') 
            ->orderby("id",'desc')
            ->get();
    }

    // Conta quantos pacientes existem
    public function total()
    {
        return $this->select('pacientes.*') 
            ->count();
    }

    // Conta quantos pacientes Activos existem
    public function countActivos()
    {
        return $this->where("status", '=', "activo")
            ->select('pacientes.*') 
            ->count();
    }

    // Conta quantos pacientes Inactivos existem
    public function countInactivos()
    {
        return $this->where("status", '=', "inactivo")
            ->select('pacientes.*')
           
            ->count();
    }

    public function getById($id)
    {
        $data = $this->where('id', $id) 
            ->first();
        return  $data;
    }
}
