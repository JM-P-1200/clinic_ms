<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PatientModel;



class Patient extends BaseController
{

	use ResponseTrait;

	public function index() {
		$model = new PatientModel();
		$data = $model->select("CONCAT_WS(', ', last_name, CONCAT_WS(' ', first_name, suffix), middle_name) as full_name,
			patient_id,
			gender,
			age,
			address,
			contact_number,
			occupation,
			status,
			DATE_FORMAT(updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->findAll();
		
		return $this->respond(['data' => $data]);
	}

	public function consulting() {
		$model = new PatientModel();
		$data = $model->select("CONCAT_WS(', ', last_name, CONCAT_WS(' ', first_name, suffix), middle_name) as full_name,
			patient_id,
			gender,
			age,
			contact_number,
		")->where('status', 1)->findAll();
		
		return $this->respond(['data' => $data]);
	}

	public function show($patient_ID = null) {
		$model = new PatientModel();

		$data = $model->select("CONCAT_WS(', ', last_name, CONCAT_WS(' ', first_name, suffix), middle_name) as full_name,
			patient_id,
			first_name,
			middle_name,
			last_name,
			suffix,
			gender,
			age,
			address,
			contact_number,
			occupation,
			status,
			DATE_FORMAT(updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->find($patient_ID);

		return $this->respond(['data' => $data]);
	}

	public function insert() {
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('patient');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$model = new PatientModel();

		$data = [
			'first_name'		=>	ucwords(strtolower($this->request->getPost('first_name'))),
			'middle_name'		=>	empty(ucwords(strtolower($this->request->getPost('middle_name'))) ) ? null : ucwords(strtolower($this->request->getPost('middle_name'))) ,
			'last_name'			=>	ucwords(strtolower($this->request->getPost('last_name'))),
			'suffix'			=>	empty($this->request->getPost('suffix')) ? null : $this->request->getPost('suffix'),
			'gender'			=>	$this->request->getPost('gender'),
			'age'				=>	$this->request->getPost('age'),
			'address'			=>	$this->request->getPost('address'),
			'contact_number'	=>	$this->request->getPost('contact_number'),
			'occupation'		=>	empty($this->request->getPost('occupation')) ? null : $this->request->getPost('occupation'),
			'status'			=>	$this->request->getPost('status'),
		];


		if(!$model->insert($data)) {
			return $this->fail(['error' => 'failed to insert data']);
		}


		return $this->respondCreated(['message' => $data]);

	}

	public function update($patient_ID = null) {
		$model = new PatientModel();
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('patient');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$data = [
			'first_name'		=>	ucwords(strtolower($this->request->getVar('first_name'))),
			'middle_name'		=>	empty(ucwords(strtolower($this->request->getVar('middle_name'))) ) ? null : ucwords(strtolower($this->request->getVar('middle_name'))) ,
			'last_name'			=>	ucwords(strtolower($this->request->getVar('last_name'))),
			'suffix'			=>	empty($this->request->getVar('suffix')) ? null : $this->request->getVar('suffix'),
			'gender'			=>	$this->request->getVar('gender'),
			'age'				=>	$this->request->getVar('age'),
			'address'			=>	$this->request->getVar('address'),
			'contact_number'	=>	$this->request->getVar('contact_number'),
			'occupation'		=>	empty($this->request->getVar('occupation')) ? null : $this->request->getVar('occupation'),
			'status'			=>	$this->request->getVar('status'),
		];

		$model->set($data)->update($patient_ID);

		return $this->respond(['message' => 'successfully saved']);
	}

	public function delete($patient_ID = null) {
		$model = new PatientModel();

		if(! $patient = $model->find($patient_ID)) {
			return $this->failNotFound();
		}

		$model->delete($patient_ID);


		return $this->respondDeleted('Patient Deleted');
	}


}
