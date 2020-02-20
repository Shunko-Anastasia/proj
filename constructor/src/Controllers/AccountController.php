<?php 

namespace Anastasia\Trip\Controllers;

use Anastasia\Trip\Core\Controller;


class AccountController extends Controller
{
	public function account(){
		$title = 'Личный кабинет';
		$content = 'account/account.php';
		$data = [
			'title'=>$title,
		];
		return parent::generateResponse($content, $data); //отвечает за вставку на страничку данных
	}
}

 ?>