<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $tituloPagina['TituloPagina'] = "Home";
        $datos['header'] = view('templates/Header', $tituloPagina);
        return view('Tablas/tabla', $datos);
    }
}
