<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;


class AuthController extends BaseController
{
    use ResponseTrait;
    
    public function login() {
        $data = $this->request->getPost();
        
        if ($this->request->getMethod() == 'GET') return $this->failNotFound('Requested URL was not found');

        $validation = \Config\Services::validation();
        $validation->setRuleGroup('login');

        
        if(!$validation->withRequest($this->request)->run()) {
            return $this->failValidationErrors($validation->getErrors());
        }

        $model = new AdminModel();

        $admin = $model->where('username', $data['username'])->first();

        if(!$admin || !password_verify($data['password'], $admin['password'])) {
            return $this->failValidationErrors(['missing' => 'Email or password does not match']);
        }
        
        //set session here
        session()->set($admin);

        return $this->respond(['Message' => $data], 200);
    }

    public function logout() {


        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}
