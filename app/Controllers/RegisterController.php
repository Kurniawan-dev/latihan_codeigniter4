<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Kint\Parser\FsPathPlugin;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UsersModel();
        $this->helpers = ['form', 'url'];
    }
    public function index()
    {
        return view('auth/register');
    }

    public function store(){
        $data = $this->request->getPost(['username', 'email', 'password']);

        if (! $this->validateData($data, $this->model->validationRules)){
            return $this->index();
        }

        $user = $this->validator->getValidated();

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}