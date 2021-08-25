<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MedicalRecordModel;

class MedicalRecord extends BaseController
{

	use ResponseTrait;

	public function index() {
		$model = new MedicalRecordModel();
		$data = $model->select("CONCAT_WS(', ', patients.last_name, CONCAT_WS(' ', patients.first_name, patients.suffix), patients.middle_name) as full_name,
			patients.patient_id,
			medical_records.medical_record_id,
			medical_records.status,
			DATE_FORMAT(medical_records.updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(medical_records.created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->join('patients', 'patients.patient_id = medical_records.patient_id', 'inner')->findAll();
		
		return $this->respond(['data' => $data]);
	}

	public function show($medical_record_id = null) {
		$model = new MedicalRecordModel();

		$data = $model->select("CONCAT_WS(', ', patients.last_name, CONCAT_WS(' ', patients.first_name, patients.suffix), patients.middle_name) as full_name,
			patients.patient_id,
			medical_records.medical_record_id,
			medical_records.status,
			medical_records.complaints,
			medical_records.body_parts,
			medical_records.diagnosis,
			medical_records.recommendations,
			DATE_FORMAT(medical_records.updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(medical_records.created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->join('patients', 'patients.patient_id = medical_records.patient_id', 'inner')->find($medical_record_id);

		$data['body_parts'] = explode(',', $data['body_parts']);

		return $this->respond(['data' => $data]);
	}

	public function insert() {
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('medical_record');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
	}

		$model = new MedicalRecordModel();

		$data = [
			'patient_id'				=>	$this->request->getPost('patient_id'),
			'complaints'				=>	$this->request->getPost('complaints'),
			'body_parts'				=>	implode(',', $this->request->getPost('body_parts')),
			'diagnosis'					=>	$this->request->getPost('diagnosis'),
			'recommendations'			=>	$this->request->getPost('recommendations'),
			'status'			=>	$this->request->getPost('status'),
		];


		if(!$model->insert($data)) {
			return $this->fail(['error' => 'failed to insert data']);
		}


		return $this->respondCreated(['message' => $data]);

	}

	public function update($medical_record_id = null) {
		$model = new MedicalRecordModel();
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('medical_record');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$data = [
			'complaints'				=>	$this->request->getVar('complaints'),
			'body_parts'				=>	implode(',', $this->request->getVar('body_parts')),
			'diagnosis'					=>	$this->request->getVar('diagnosis'),
			'recommendations'			=>	$this->request->getVar('recommendations'),
			'status'			=>	$this->request->getVar('status'),
		];

		$model->set($data)->update($medical_record_id);

		return $this->respond(['message' => 'successfully saved']);
	}

	public function delete($medical_record_id = null) {
		$model = new MedicalRecordModel();

		if(! $medical_record = $model->find($medical_record_id)) {
			return $this->failNotFound();
		}

		$model->delete($medical_record_id);


		return $this->respondDeleted('Medical Record Deleted');
	}


}
