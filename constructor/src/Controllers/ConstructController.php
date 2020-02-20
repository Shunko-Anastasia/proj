<?php 

namespace Anastasia\Trip\Controllers;

use Anastasia\Trip\Core\Controller;


class ConstructController extends Controller
{
	public function construct(){
		$title = 'Путешествия';
		$content = 'construct.php';
		$data = [
			'title'=>$title,
		];
		return parent::generateResponse($content, $data); //отвечает за вставку на страничку данных
	}
}

 ?>
