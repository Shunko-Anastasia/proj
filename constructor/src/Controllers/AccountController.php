<!-- <?php 

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

 -->

 <?php


namespace Anastasia\Trip\Controllers;

use Anastasia\Trip\Core\Controller;
use Anastasia\Trip\Core\Request;
use Anastasia\Trip\Models\AccountModel;

class AccountController extends Controller
{
    private $account_model;
    public function __construct()
    {
        $this->account_model = new AccountModel();
    }

    public function regAction() {
        $content = 'account/registration.php';
        $data = [
            'page_title'=>'Зарегистрироваться'
        ];
        return $this->generateResponse($content, $data);
    }

    public function accountAction(){
        if (!isset($_SESSION['login'])){
            header('Location:/');
        }
        $content = 'account/account.php';
        $data = [
            'page_title'=>'Личный кабинет'
        ];
        return $this->generateResponse($content, $data);
    }

    public function addUser(Request $request){
        $result = $this->account_model
            ->addUser($request->post());
        $content = 'account/registration.php';
        $data = [
            'page_title'=>'Зарегистрироваться',
            'result' => $result
        ];
        return $this->generateResponse($content, $data);
    }
    public function login(Request $request) {
        $formData = $request->post();
        $result = $this->account_model->authorisation($formData);
        if ($result === AccountModel::SUCCESS) {
            $_SESSION['login'] = $formData['login'];
        }
        return $this->ajaxResponse($result);
    }
    public function logout(){
        unset($_SESSION['login']);
        $_SESSION = [];
        session_destroy();
        header('Location: /');
    }

}