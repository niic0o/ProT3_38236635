<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class panel_controller extends Controller
{
    public function index()
    {
        $session = session();
        $nombre = $session->get('usuario');
        $perfil = $session->get('perfil_id');
        $dni = $session->get('dni');
        $id_usuario = $session->get('id_usuario');

        $datab['perfil_id'] = $perfil;
        $data['titulo'] = 'Panel del Usuario';
        $datab['nombre'] = $nombre;
        $datab['dni'] = $dni;
        $datab['id_usuario'] = $id_usuario;
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/usuario_logueado', $datab);
        echo view('front/footer_view');
    }
}
