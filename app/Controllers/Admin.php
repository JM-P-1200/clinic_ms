<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminModel;

class Admin extends BaseController
{

	use ResponseTrait;

	public function all() {
		$model = new AdminModel();
		return $this->respond(['data' => $model->findAll()]);
	}

	public function show($admin_ID = null) {
		$model = new AdminModel();
		return $this->respond(['data' => $model->find($admin_ID)]);
	}

	public function insert() {
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('admin');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$model = new AdminModel();

		$data = [
			'full_name'			=>	ucwords(strtolower($this->request->getPost('full_name'))),
			'password'			=>	password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'username'			=>	$this->request->getPost('username'),
			'email'				=>	$this->request->getPost('email'),
			'role'				=>	$this->request->getPost('role'),
		];

		if(!$newUser = $model->insert($data)) {
			return $this->fail(['error' => 'failed to insert data']);
		}

		return $this->respondCreated(['message' => $data]);

	}

	public function update($admin_ID = null) {
		$model = new AdminModel();
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('adminupdate');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$data = [
			'full_name'			=>	ucwords(strtolower($this->request->getVar('full_name'))),
			'admin_id'			=>	$this->request->getVar('admin_id'),
			'username'			=>	$this->request->getVar('username'),
			'email'			=>	$this->request->getVar('email'),
			'role'			=>	$this->request->getVar('role'),
		];

		$model->save($data);

		return $this->respond(['message' => 'successfully saved']);
	}

	public function delete($admin_ID = null) {
		$model = new AdminModel();

		if(! $room_type = $model->find($admin_ID)) {
			return $this->failNotFound();
		}

		$model->delete($admin_ID);

		return $this->respondDeleted('User Deleted');
	}

}
