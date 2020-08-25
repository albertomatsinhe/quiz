<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //

    protected $table = 'fornecedores';

    public function getAll()
    {
        return $this->select('fornecedores.*')
            ->where('empresa_id', '=', $this->empresa)
            ->orderby("id",'desc')
            ->get();
    }

    // Conta quantos fornecedores existem
    public function total()
    {
        return $this->select('fornecedores.*')
            ->where('empresa_id', '=', $this->empresa)
            ->count();
    }

    // Conta quantos fornecedores Activos existem
    public function countActivos()
    {
        return $this->where("status", '=', "activo")
            ->select('fornecedores.*')
            ->where('empresa_id', '=', $this->empresa)
            ->count();
    }

    // Conta quantos fornecedores Inactivos existem
    public function countInactivos()
    {
        return $this->where("status", '=', "inactivo")
            ->select('fornecedores.*')
            ->where('empresa_id', '=', $this->empresa)
            ->count();
    }

    public function getById($id)
    {
        $data = $this->where('id', $id)
            ->where('empresa_id', '=', $this->empresa)
            ->first();
        return  $data;
    }
}
