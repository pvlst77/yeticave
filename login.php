<?php
require_once('functions.php');
require_once ('data.php');

$err = [];
$message = [];
$flag = 0;
$pattern = '/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i';
$form = '';

$connection = new mysqli('127.0.0.1', 'root', '', 'yeticave');

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email = clear_data($_POST['email']);
    $pass = clear_data($_POST['pass']);

    if(empty($email))
    {
        $err['email'] = 'form__item--invalid';
        $message['email'] = '<span class="form__error">Введите e-mail</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern,$email))
        {
            $err['email'] = 'form__item--invalid';
            $message['email'] = '<span class="form__error">Некорректно введен адрес электронной почты</span>';
            $flag = 1;
        }
    }
    if(empty($pass))
    {
        $err['pass'] = 'form__item--invalid';
        $message['pass'] = '<span class="form__error">Введите пароль</span>';
        $flag = 1;
    }
    if(!empty($err))
    {
        $form = 'form--invalid';
        $message['form'] = '<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>';
        $flag = 1;
    }
    if(!empty($email)&&!empty($pass))
    {
        $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `pass` = '$pass'";

        $query_result = $connection->query($query);

        $result = $query_result-> fetch_array();

        if(empty($result))
        {
            $form = 'form--invalid';
            $message['form'] = '<span class="form__error form__error--bottom">Вы ввели неправильную почту или пароль</span>';
            $flag = 1;

            $data_main = ['categories' => $categories, 'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

            $main = include_template('login.php', $data_main);
            $layout_content = include_template('layout.php', [
                'main' => $main,
                'categories' => $categories,
                'arrayusers' =>$arrayusers,
                'title' => 'Вход',
                'user_name' => $user
            ]);

            print($layout_content);
            exit();
        }
        else
        {
            setcookie('user', $result['name'], time() + 3600, "/");

            $connection->close();

            header('Location: index.php');
        }
    }
    else
    {
        $data_main = ['categories' => $categories, 'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

        $main = include_template('login.php', $data_main);
        $layout_content = include_template('layout.php', [
            'main' => $main,
            'categories' => $categories,
            'arrayusers' =>$arrayusers,
            'title' => 'Вход',
            'user' => $user
        ]);

        print($layout_content);
    }
}
else
{
    $data_main = ['categories' => $categories, 'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

    $main = include_template('login.php', $data_main);
    $layout_content = include_template('layout.php', [
        'main' => $main,
        'categories' => $categories,
        'arrayusers' =>$arrayusers,
        'title' => 'Вход',
        'user' => $user
    ]);

    print($layout_content);
}
?>