<?php  
/**
 * Home Controller
 */
namespace App\Controllers;
use \Core\View;

class Home extends \Core\Controller
{
	
	protected function before()
	{
		//	
	}

	protected function after()
	{
		//
	}

	public function indexAction()
	{
		$userInfo = [
			'username' => 'mostafa',
			'email'		=> 'mostafa@gmail.com'
		];	
		$role = 'manager';
		// View::render('Home.index', [ 'userInfo' => $userInfo, 'role' => $role ]);
		View::renderTemplate('Home.index', [
			'userInfo'	=>	$userInfo,
			'role'		=>	$role,
			'colors'	=>	[
				'red', 'green', 'blue'
			]
		]);
	}
}