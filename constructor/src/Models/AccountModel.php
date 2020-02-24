<?php


namespace Anastasia\Trip\Models;

use Anastasia\Trip\Core\DBConnection;

class AccountModel
{   const SUCCESS = "Авторизация прошла успешно";
    const ERROR = "Ошибка авторизации";
    const USER_EXISTS = 'Пользователь с таким логином уже существует';
    const REGISTRATION_FAILED = 'Вы не были зарегистрированы';
    const REGISTRATION_SUCCESS = 'Регистрация прошла успешно';
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function authorisation(array $formData)
    {
        $login = $formData['login'];
        $pwd = $formData['pwd'];
        $user = $this->isUser($login);
        if(!$user) {
            return self::ERROR;
        }
        if(!password_verify($pwd, $user['pwd'])) {
            return self::ERROR;
        }
        return self::SUCCESS;
    }

    public function addUser(array $user_data){
        $login = $user_data['login'];
        if ($this->isUser($login)) return self::USER_EXISTS;
        $pwd = $user_data['password'];
        $pwd = password_hash($pwd,
            PASSWORD_DEFAULT);
        $user_sql = "INSERT INTO user (login, pwd)
VALUES (:login, :pwd)";

        $user_info_sql = "INSERT INTO user_info
(email, phone, user_iduser) VALUES (:email, :phone, :user_id)";
        try{
            // начало транзакции
            $this->db->getConnection()
                ->beginTransaction();
            $user_params = [
                'login' => $login,
                'pwd'=>$pwd
            ];
            $this->db->executeSql($user_sql, $user_params);

            $info_params = [
                'email'=>$user_data['aemail'],
                'phone'=>$user_data['phone'],
                'user_id'=> $this->db->getConnection()
                    ->lastInsertId()
            ];
            $this->db->executeSql($user_info_sql,
                $info_params);

            $this->db->getConnection()->commit();
            return self::REGISTRATION_SUCCESS;
        } catch (Exception $e) { 
            $this->db->getConnection()->rollBack();
            return self::REGISTRATION_FAILED;


        }
    }

    private function isUser(string $login){
        $sql = 'SELECT * FROM user WHERE login = :login';
        $user = $this->db->execute($sql,
            ['login'=>$login], false);
        return $user;
    }
}