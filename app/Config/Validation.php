<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------


	public $login = [
        'username' => 'required',
        'password' => 'required'
	];

	public $login_errors = [
	    'username' => [
	    	'required'   =>  'Username is required',
	    ],
	    'password' => [
	    	'required'   =>  'Password is required'
	    ]

	];

	public $medical_prescription = [
        'prescription' => 'required',
	];

	public $medical_prescription_errors = [
	    'prescription' => [
	    	'required'   =>  'Prescription is required'
	    ]

	];


	public $medical_record = [
        'patient_id' => 'required',
        'complaints' => 'required',
	];

	public $medical_record_errors = [
	    'patient_id' => [
	    	'required'   =>  'Consulting patient is required'
	    ],
	    'complaints' => [
	    	'required'   =>  'Complaint/s is required'
	    ]

	];


	public $patient = [
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'address' => 'required',
        'contact_number' => 'required',
        'status' => 'required'
	];

	public $patient_errors = [
	    'first_name' => [
	    	'required'   =>  'First Name is required',
	    ],
	    'last_name' => [
	    	'required'   =>  'Last Name is required',
	    ],
	    'gender' => [
	    	'required'   =>  'Gender is required'
	    ],
	    'age' => [
	    	'required'   =>  'Age is required'
	    ],
	    'address' => [
	    	'required'   =>  'Address is required'
	    ],
	    'contact_number' => [
	    	'required'   =>  'Contact Number is required'
	    ],	   
	    'status' => [
	    	'required'   =>  'Status is required'
	    ],	

	];



	//SETTINGS ================================================================

	public $password = [
        'old_password' => 'required',
        'new_password' => 'required',
        'confirm_new_password' => 'required',
	];

	public $password_errors = [
	    'old_password' => [
	    	'required'   =>  'Old Password is required',
	    ],
	    'new_password' =>  [
	    	'required'	=>	'New Password is required'
	    ],
	    'confirm_new_password' => [
	    	'required'   =>  'Confirm Password is required'
	    ],
	];

	public $admin = [
        'full_name' => 'required',
        'username' => 'required',
        'email' => 'required|valid_email',
        'password' => 'required',
        'confirm_password' => 'required|matches[password]',
        'role' => 'required',
	];

	public $admin_errors = [
	    'full_name' => [
	    	'required'   =>  'Full Name is required',
	    ],
	    'username' =>  [
	    	'required'	=>	'Username is required'
	    ],
	    'email' => [
	    	'required'   =>  'Email is required',
	    	'valid_email'   =>  'Invalid Email'
	    ],
	    'password' => [
	    	'required'   =>  'Password is required'
	    ],
	    'confirm_password' => [
	    	'required'   =>  'Confirm Password is required',
	    	'matches'	=>	'Password does not match'
	    ],
	    'role' => [
	    	'required'   =>  'Role is required'
	    ],
	];

	public $adminupdate = [
        'full_name' => 'required',
        'username' => 'required',
        'email' => 'required|valid_email',
        'role' => 'required',
	];

	public $adminupdate_errors = [
	    'full_name' => [
	    	'required'   =>  'Full Name is required',
	    ],
	    'username' =>  [
	    	'required'	=>	'Username is required'
	    ],
	    'email' => [
	    	'required'   =>  'Email is required',
	    	'valid_email'   =>  'Invalid Email'
	    ],
	    'role' => [
	    	'required'   =>  'Role is required'
	    ],
	];


}
