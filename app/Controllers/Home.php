<?php

namespace App\Controllers;

class Home extends BaseController
{
    /* esta función estaba por defecto
    public function index(): string
    {
        return view('front/principal');
    }
    */

    public function index()
    {
        $data['titulo'] = 'Página Principal';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('front/principal');
        echo view('front/footer_view');
    }

    public function quienes_somos()
    {
        $data['titulo'] = '¿Quiénes Somos?';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }

    public function acerca_de()
    {
        $data['titulo'] = 'Acerca de...';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('front/acerca_de');
        echo view('front/footer_view');
    }

    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function login()
    {
        $data['titulo'] = 'Iniciar Sesión';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function catalogo()
    {
        $data['titulo'] = 'Catálogo';
        echo view('front/head_view',$data);
        echo view('front/navbar_view');
        echo view('front/catalogo');
        echo view('front/footer_view');
    }
}
