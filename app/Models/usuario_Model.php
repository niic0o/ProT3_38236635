<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_Model extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = [
        'nombre', 'apellido', 'usuario', 'email', 'pass', 'provincia',
        'ciudad', 'domicilio', 'dni', 'perfil_id', 'baja'
    ];

    public function getAllUsuariosActivos()
    {
        return $this->where('baja', 'NO')->findAll();
    }

    public function getAllUsuariosEliminados()
    {
        return $this->where('baja', 'SI')->findAll();
    }

    public function getUsuario($id_usuario){
        return $this->find($id_usuario);
    }
    // find() solo busca claves primarias
    public function getUsuarioByDNI($dni)
    {
        return $this->where('dni', $dni)->first();
    }
}
