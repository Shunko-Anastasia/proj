<?php 

namespace Anastasia\Trip\Controllers;

use Anastasia\Trip\Core\Controller;


class RegistrationController extends Controller
{
	public function registration(){
		$title = 'Регистрация';
		$content = 'account/registration.php';
		$data = [
			'title'=>$title,
		];
		return parent::generateResponse($content, $data); //отвечает за вставку на страничку данных
	}
}

 ?>