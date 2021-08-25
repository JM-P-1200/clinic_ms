<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

use App\Filters\AdminAuthFilter;

class Filters extends BaseConfig
{

	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'adminauth'=> AdminAuthFilter::class

	];


	public $globals = [
		'before' => [

		],
		'after'  => [
			'toolbar',
		],
	];


	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'adminauth'	=>	[
			['before' => [
				'home',
				'apartment/*',
				'apartment/informations',
				'apartment/informations/*'
			]]
		]
	];
}
