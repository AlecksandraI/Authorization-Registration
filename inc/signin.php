<?php
session_start();
//Класс авторизации пользователя
class Autorization{
    public $login;
    public $password;
    public function verification(){
        $this->login = $_POST['login'];
        $this->password = md5($_POST['password'].'соль');
        if(file_exists('database.json')){
            $file = file_get_contents('database.json');
            $taskList = json_decode($file, false);
            foreach ($taskList as $key => $value) {
                if ($value -> login === $this->login and $value->password === $this->password) {
                    $_SESSION['user'] = [
                      "name" =>$value->name,
                    ];
                    $response =[
                        "status" => true
                    ];
                    echo json_encode($response);
                    return;
                }
            }
            $response =[
                "status" => false,
                "message" => 'Неверный логин или пароль!'
            ];
            echo json_encode($response);
        }
    }
}

$autorization = new Autorization();
$autorization->verification();