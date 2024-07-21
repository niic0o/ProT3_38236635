<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{
    // En cada funcion hay que controlar el perfil del usuario para evitar usos indebidos

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        if (session()->get('perfil_id') == 2) {
            return redirect()->to('/');
        }
        $data['titulo'] = 'Registro';
        //debo generar un array vacio para que en la vista $usuario no me tire una excepcion
        $data['usuario'] = array(
            'nombre' => '',
            'apellido' => '',
            'usuario' => '',
            'provincia' => '',
            'ciudad' => '',
            'domicilio' => '',
            'dni' => '',
        );
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro', $data);
        echo view('front/footer_view');
    }

    public function formValidation()
    {

        $input = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[50]|alpha_space',
            'apellido' => 'required|min_length[3]|max_length[25]|alpha_space',
            'usuario' => 'required|min_length[3]|max_length[10]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[6]|max_length[16]',
            'provincia' => 'required|min_length[4]|max_length[50]|alpha_space',
            'ciudad' => 'required|min_length[4]|max_length[50]|alpha_space',
            'domicilio' => 'required|min_length[6]|max_length[100]',
            'dni' => 'required|min_length[6]|max_length[8]|numeric|is_unique[usuarios.dni]'
        ]);

        //instancio un formModel del tipo de modelo para pasarle los datos
        $formModel = new usuario_Model();

        if (!$input) {
            //si no pasa la validación this.validation controla la respuesta de error
            //return redirect()->withInput($this->request->getPost())->with('validation', $validation)->to('/registro');
            $data['titulo'] = 'Registrarse';
            $usuario = $this->request->getPost(); // carga el array $data>$old con todos los campos del form
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', ['validation' => $this->validator, 'usuario' => $usuario]); //le paso al form el array
            echo view('front/footer_view');
        } else {
            //si pasa entonecs guardo en la instancia de usuario_model los datos
            $formModel->save([
                /*los atributos de getVar deben coincidir con el valor de la prop name
                en la etiqueta <input> del formulario de bootstrap*/
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'provincia' => $this->request->getVar('provincia'),
                'ciudad' => $this->request->getVar('ciudad'),
                'domicilio' => $this->request->getVar('domicilio'),
                'dni' => $this->request->getVar('dni')
            ]);
            $perfil_id = session()->get('perfil_id');

            if ($perfil_id == 1) {
                session()->setFlashdata('msg', 'Usuario registrado con éxito');
                return redirect()->to('/panel');
            } else {
                session()->setFlashdata('msg', 'Usuario registrado con exito');
                return redirect()->to('/login');
            }
        }
    }
    public function verUsuarios()
    {
        if (session()->get('perfil_id') == 1) {
            $formModel = new usuario_Model();
            $data['titulo'] = 'Listado de Usuarios';
            $datab['usuarios'] = $formModel->getAllUsuariosActivos();
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/listado', $datab);
            echo view('front/footer_view');
        } else {
            return redirect()->to('/');
        }
    }

    public function verUsuariosEliminados()
    {
        if (session()->get('perfil_id') == 1) {
            $formModel = new usuario_Model();
            $data['titulo'] = 'Listado de Usuarios';
            $datab['usuarios'] = $formModel->getAllUsuariosEliminados();
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/listado_de_eliminados', $datab);
            echo view('front/footer_view');
        } else {
            return redirect()->to('/');
        }
    }

    public function buscar_usuario()
    {
        $formModel = new usuario_Model();
        $dni = $this->request->getVar('dni');
        $usuario = $formModel->getUsuarioByDNI($dni);
        if (!$usuario) {
            session()->setFlashdata('msg', 'El usuario seleccionado no se puede editar o no se encuentra');
            //return redirect()->to('/listado');        
        }
        $data['titulo'] = 'Editar Usuario';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        // recordar que 'es un array' => $es un objeto del tipo usuario_Model. La funcion view() solo admite como segundo
        // parametro un array
        echo view('back/usuario/editar_usuario', ['usuario' => $usuario]); //le paso los datos del usuario al formulario de edicion
        echo view('front/footer_view');
    }

    // Esta funcion es llamada por un formulario de metodo post, el cual al hacer imput pasa los datos
    // a los cuales puedo acceder usando $this->request
    public function editar_usuario()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        $input = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[50]|alpha_space',
            'apellido' => 'required|min_length[3]|max_length[25]|alpha_space',
            'usuario' => 'required|min_length[3]|max_length[10]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'provincia' => 'required|min_length[4]|max_length[50]|alpha_space',
            'ciudad' => 'required|min_length[4]|max_length[50]|alpha_space',
            'domicilio' => 'required|min_length[6]|max_length[100]',
            'dni' => 'required|min_length[6]|max_length[8]|numeric'
        ]);

        $formModel = new usuario_Model();
        //si la validacion no pasa
        if (!$input) {
            $data['titulo'] = 'Editar usuario';
            $usuario = $formModel->getUsuario($this->request->getVar('id_usuario')); // carga el array $data>$old con todos los campos del form
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/editar_usuario', ['validation' => $this->validator, 'usuario' => $usuario]); //le paso al form el array
            echo view('front/footer_view');
        } else {
            try {
                $datab = [
                    'nombre' => $this->request->getVar('nombre'),
                    'apellido' => $this->request->getVar('apellido'),
                    'usuario' => $this->request->getVar('usuario'),
                    'email' => $this->request->getVar('email'),
                    //'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                    'provincia' => $this->request->getVar('provincia'),
                    'ciudad' => $this->request->getVar('ciudad'),
                    'domicilio' => $this->request->getVar('domicilio'),
                    'dni' => $this->request->getVar('dni'),
                ];
                $formModel->update($id_usuario, $datab);
                session()->setFlashdata('msg', 'Usuario actualizado con exito');
                $perfil_id = session()->get('perfil_id');

                if ($perfil_id == 2) {
                    // Actualizar sesión del usuario con los datos actualizados
                    $session = session();
                    $session->set('id_usuario', $this->request->getVar('id_usuario'));
                    $session->set('nombre', $this->request->getVar('nombre'));
                    $session->set('apellido', $this->request->getVar('apellido'));
                    $session->set('email', $this->request->getVar('email'));
                    $session->set('usuario', $this->request->getVar('usuario'));
                    $session->set('dni', $this->request->getVar('dni'));

                    session()->setFlashdata('msg', 'Usuario modificado con éxito');
                    return redirect()->to('/panel');
                } else {
                    $session = session();
                    $session->set('id_usuario', $this->request->getVar('id_usuario'));
                    $session->set('nombre', $this->request->getVar('nombre'));
                    $session->set('apellido', $this->request->getVar('apellido'));
                    $session->set('email', $this->request->getVar('email'));
                    $session->set('usuario', $this->request->getVar('usuario'));
                    $session->set('dni', $this->request->getVar('dni'));

                    session()->setFlashdata('msg', 'Sus datos han sido actualizados');
                    return redirect()->to('/panel');
                }
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Error al actualizar el usuario. Por favor, inténtelo de nuevo más tarde, o revise su conexión a internet.');
                return redirect()->to('/logout');
            }
        }
    }

    public function eliminar_usuario()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        $formModel = new usuario_Model();
        //elimina logicamente estableciendo el campo baja en "SI"
        $datab = ['baja' => 'SI'];
        $formModel->update($id_usuario, $datab);
        session()->setFlashdata('msg', 'Usuario eliminado con exito');
        $perfil_id = session()->get('perfil_id');
        if ($perfil_id == 2) {
            // Actualizar sesión del usuario con los datos actualizados
            session()->setFlashdata('msg', 'Usuario eliminado');
            return redirect()->to('/logout');
        }
        return redirect()->to('/listado');
    }

    public function reestablecer_usuario()
    {
        $id_usuario = $this->request->getVar('id_usuario');
        $formModel = new usuario_Model();
        //reestablece logicamente el campo baja en "NO", por ende, el usuario.
        $datab = ['baja' => 'NO'];
        $formModel->update($id_usuario, $datab);
        session()->setFlashdata('msg', 'Usuario reestablecido con exito');
        return redirect()->to('/listado_de_eliminados');
    }

    public function darme_de_baja()
    {
        if (session()->get('perfil_id') == 2) {
            $session = session();
            $nombre = $session->get('usuario');
            $perfil = $session->get('perfil_id');
            $dni = $session->get('dni');
            $id_usuario = $session->get('id_usuario');

            $datab['perfil_id'] = $perfil;
            $data['titulo'] = 'Darme de Baja';
            $datab['nombre'] = $nombre;
            $datab['dni'] = $dni;
            $datab['id_usuario'] = $id_usuario;
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/darme_de_baja', $datab);
            echo view('front/footer_view');
        } else {
            return redirect()->to('/');
        }
    }
}
