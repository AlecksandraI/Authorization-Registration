<?php
session_start();
//Класс регистрации пользователя
class User
{
    public $login;
    public $password;
    public $confirm_password;
    public $email;
    public $name;
    //Функция регистрации, проверяющая заполнение полей пользователем. После успешного заполнения происходит запись пользователя в БД.
    public function Registration(){
        $this->login = $_POST['login'];
        $this->password = md5($_POST['password'].'соль');
        $this -> confirm_password = md5($_POST['confirm_password'].'соль');
        $this->email = $_POST['email'];
        $this->name = $_POST['name'];
        $data = $_POST;
        if (isset($data['do_signup'])) {
            if (trim($data['login']) == '') {
                $_SESSION['message'] = 'Введите логин!';
                header('Location: ../registration.php');
            } else if ($data['password'] == '') {
                $_SESSION['message'] = 'Введите пароль!';
                header('Location: ../registration.php');
            } else if ($this->password !== $this->confirm_password) {
                $_SESSION['message'] = 'Пароли не совпадают!';
                header('Location: ../registration.php');
            } else if (trim($data['email']) == '') {
                $_SESSION['message'] = 'Введите email!';
                header('Location: ../registration.php');
            } else if (trim($data['name']) == '') {
                $_SESSION['message'] = 'Введите имя!';
                header('Location: ../registration.php');
            }
            else if($data['login']){
                $file = file_get_contents('database.json', 'a+');
                $taskList = json_decode($file, false);
                foreach ($taskList as $key => $value){
                    if ($value -> login === $this->login or $value->email === $this->email) {
                        $_SESSION['message'] = 'Данный логин или emil уже зарегестрирован!';
                        header('Location: ../registration.php');
                    }
                }
            }
            else {
                if (!empty($_POST)) {
                    $file = file_get_contents('database.json', 'a+');
                    $taskList = json_decode($file, true);
                    unset($file);
                    $taskList[] = [
                        "login" => $this->login,
                        "password" => $this->password,
                        "confirm_password" => $this->confirm_password,
                        "email" => $this->email,
                        "name" => $this->name];
                    file_put_contents('database.json', json_encode($taskList, JSON_UNESCAPED_UNICODE));
                    unset($taskList);
                }
                $_SESSION['message'] = 'Регистрация успешно завершена!';
                header('Location: ../index.php');
            }
        }
    }
}

$user = new User();
$user->Registration();