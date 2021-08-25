<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MedicalPrescriptionModel;

class MedicalPrescription extends BaseController
{

	use ResponseTrait;

	public function index($medical_record_id = null) {
		$model = new MedicalPrescriptionModel();
		$data = $model->select("
			prescription,
			medical_record_id,
			medical_prescription_id,
			DATE_FORMAT(updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->where('medical_record_id', $medical_record_id)->findAll();
		
		return $this->respond(['data' => $data]);
	}

	public function show($medical_prescription_id = null) {
		$model = new MedicalPrescriptionModel();

		$data = $model->select("medical_prescription_id,
			prescription,
			medical_record_id,
			DATE_FORMAT(updated_at, '%b %e, %Y - %l:%i %p') as updated_at,
			DATE_FORMAT(created_at, '%b %e, %Y - %l:%i %p') as created_at,
		")->find($medical_prescription_id);

		return $this->respond(['data' => $data]);
	}

	public function insert() {
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('medical_prescription');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$model = new MedicalPrescriptionModel();

		$data = [
			'medical_record_id'		=>	$this->request->getPost('medical_record_id'),
			'prescription'			=>	$this->request->getPost('prescription'),
		];


		if(!$model->insert($data)) {
			return $this->fail(['error' => 'failed to insert data']);
		}


		return $this->respondCreated(['message' => $data]);

	}

	public function update($medical_prescription_id = null) {
		$model = new MedicalPrescriptionModel();
		$validation = \Config\Services::validation();
		$validation->setRuleGroup('medical_prescription');

		if(!$validation->withRequest($this->request)->run()) {
			return $this->failValidationErrors(["errors" => $validation->getErrors()]);
		}

		$data = [
			'prescription'			=>	$this->request->getVar('prescription'),
		];

		$model->set($data)->update($medical_prescription_id);

		return $this->respond(['message' => 'successfully saved']);
	}

	public function delete($medical_prescription_id = null) {
		$model = new MedicalPrescriptionModel();

		if(! $patient = $model->find($medical_prescription_id)) {
			return $this->failNotFound();
		}

		$model->delete($medical_prescription_id);


		return $this->respondDeleted('Medical Prescription Deleted');
	}


}
