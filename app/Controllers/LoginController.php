<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new UsersModel();
        $this->helpers = ['form', 'url'];
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('/admin/news'));
        }

        return view('auth/login');
    }

    public function login() {
        $data = $this->request->getPost(['email', 'password']);

        if (! $this->validateData($data, [
            'email' => 'required',
            'password' => 'required'
        ])) {
            return $this->index();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $credential = ['email' => $email];

        $user = $this->model->where($credential)->first();

        if (! $user) {
            session()->setFlashdata('error', 'Email Anda salah!');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Password Anda Salah!');
            return redirect()->back();
        }

        $userData = [
            'username'  => $user['username'],
            'email'     => $user['email'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('/admin/news'));
    }
    private function isLoggedIn(): bool 
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

}