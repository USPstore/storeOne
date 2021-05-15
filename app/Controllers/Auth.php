<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function register()
    {
        // menangkap data yang diposkan dr form
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            dd($data);
        }
        $data = [
            'title' => 'Form Registrasi| USP'
        ];
        return view('register', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Form Registrasi| USP'
        ];
        return view('login', $data);
    }
    public function logout()
    {
        $data = [
            'title' => 'Form Registrasi| USP'
        ];
        return view('logout', $data);
    }
}
