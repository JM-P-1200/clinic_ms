<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PatientModel;
use App\Models\MedicalRecordModel;
use App\Models\MedicalPrescriptionModel;

class InterfaceController extends BaseController
{

	public function index() {
        if(session()->get('admin_id'))
            return redirect()->to(base_url('home'));
        else
            return redirect()->to(base_url('login'));
	}

    public function login() {
        if(session()->get('admin_id')) {
            return redirect()->to(base_url('home'));
        }
        
        return view('login');
    }

    public function dashboard() {
        $patientModel = new PatientModel();
        $medicalPrescriptionModel = new MedicalPrescriptionModel();
        $medicalRecordModel = new MedicalRecordModel();

        $total_patients = $patientModel->countAllResults();
        $total_medical_prescriptions = $medicalPrescriptionModel->countAllResults();
        $total_medical_records = $medicalRecordModel->countAllResults();

        $data = [
            'total_patients'                 =>  $total_patients,
            'total_medical_prescriptions'    =>  $total_medical_prescriptions,
            'total_medical_records'          =>  $total_medical_records,
        ];



        return view('dashboard', ['data' => $data]);
    }

    public function medicalPrescriptions($medical_record_id = null) {

        $data = [
            'medical_record_id'                 =>  $medical_record_id,
        ];

    	return view('medical/prescriptions' , ['data' => $data]);
    }

    public function medicalRecords() {
        return view('medical/records');
    }

    public function registeredPatients() {
        return view('patient/registered');
    }

    public function users() {
        return view('users');
    }


}
