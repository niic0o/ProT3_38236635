<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class login_controller extends BaseController
{
    public function index()
    {
        if (session()->get('perfil_id') == null) {
        helper(['form', 'url']);
        $data['titulo'] = 'Inicio de Sesión';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
        }else{
            return redirect()->to('/');
        }
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_Model();

        //traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        //firts agrega eficiencia al frenar la busqueda al encontrar el email.
        $datab = $model->where('email', $email)->first();
        //Si no se encuentra un registro $datab = null
        if ($datab) {
            $pass = $datab['pass'];
            $ba = $datab['baja'];
            if ($ba == "SI") {
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/login');
            }
            /*Se verifican los datos ingresados para iniciar, si cumple la
            verificacion inicia sesion */
            $verify_pass = password_verify($password, $pass);
            //password_verify determina los requisitos de conf de la contraseña
            if ($verify_pass) {
                $ses_data = [
                    'id_usuario' => $datab['id_usuario'],
                    'nombre' => $datab['nombre'],
                    'apellido' => $datab['apellido'],
                    'email' => $datab['email'],
                    'usuario' => $datab['usuario'],
                    'dni' => $datab['dni'],
                    'perfil_id' => $datab['perfil_id'],
                    'logged_in' => TRUE
                ];

                // Si se cumpla la verif inicia la sesión
                $session->set($ses_data);

                session()->setFlashdata('msg', 'Bienvenid@!!');
                return redirect()->to('/panel');
            } else {
                //si no pasa la verif de la contraseña
                $session->setFlashdata('msg', 'Contraseña Incorrecta');
                return redirect()->to('/login');
            }
        }else {
            $session->setFlashdata('msg', 'No existe el Email o es incorrecto');
            return redirect()->to('/login');
        }
}
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}