<?php
require_once ('functions.php');
require_once ('data.php');
if(empty($user))
{
    $main = include_template("403.php", array());

    $layout_content = include_template('layout.php', [
        'main' => $main,
        'categories' => $categories,
        'arrayusers' =>$arrayusers,
        'title' => 'Добавление лота',
        'user_name' => $user
    ]);
    print($layout_content);
}
else
{
    
    $connection = new mysqli('127.0.0.1', 'root', '', 'yeticave');

$pattern = '/^[ 0-9]+$/';

$err = [];
$message = [];
$flag = 0;
$form = '';
$date = date('Y-m-d H:i:s');

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $lot_name = clear_data($_POST['lot_name']);
    $categorie = clear_data($_POST['categorie']);
    $description = clear_data($_POST['description']);
    $image = clear_data($_FILES['image']['name']);
    $start_cost = clear_data($_POST['start_cost']);
    $shag_sravka = clear_data($_POST['shag_sravka']);
    $data_stop = clear_data($_POST['data_stop']);

    if(empty($lot_name))
    {
        $err['lot_name'] = 'form__item--invalid';
        $message['lot_name'] = '<span class="form__error">Введите наименование лота</span>';
        $flag = 1;
    }
    if($categorie=="Выберите категорию")
    {
        $err['categorie'] = 'form__item--invalid';
        $message['categorie'] = '<span class="form__error">Выберите категорию</span>';
        $flag = 1;
    }
    if(empty($description))
    {
        $err['description'] = 'form__item--invalid';
        $message['description'] = '<span class="form__error">Напишите описание лота</span>';
        $flag = 1;
    }
    if(empty($image))
    {
        $err['image'] = 'form__item--invalid';
        $message['image'] = '<span class="form__error">Добавьте изображение к лоту</span>';
        $flag = 1;
    }
    else
    {
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
    }
    if(empty($start_cost))
    {
        $err['start_cost'] = 'form__item--invalid';
        $message['start_cost']= '<span class="form__error">Введите начальную цену</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern, $start_cost))
        {
            $err['start_cost'] = 'form__item--invalid';
            $message['start_cost'] = '<span class="form__error">Используйте только цифры</span>';
            $flag = 1;
        }
    }
    if(empty($shag_sravka))
    {
        $err['shag_sravka'] = 'form__item--invalid';
        $message['shag_sravka']= '<span class="form__error">Введите шаг ставки</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern, $shag_sravka)) {
            $err['shag_sravka'] = 'form__item--invalid';
            $message['shag_sravka'] = '<span class="form__error">Используйте только цифры</span>';
            $flag = 1;
        }
    }
    if(empty($data_stop))
    {
        $err['data_stop'] = 'form__item--invalid';
        $message['data_stop'] = '<span class="form__error">Введите дату завершения торгов</span>';
        $flag = 1;
    }
    else
    {
        if($data_stop<= $date)
        {
            $err['data_stop'] = 'form__item--invalid';
            $message['data_stop'] = '<span class="form__error">Введите актуальную дату завершения торгов</span>';
            $flag = 1;
        }
    }
    if(!empty($err))
    {
        $form = 'form--invalid';
        $message['form'] = '<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>';
        $flag = 1;
    }

    if(!empty($lot_name)&&!empty($categorie)&&!empty($description)&&!empty($image)&&!empty($start_cost)&&!empty($shag_sravka)&&!empty($data_stop))
    {
        $query1 = "SELECT id_categorie from categorie where name = '$categorie'";

        $query = "INSERT INTO lot (id_winner,id_categorie,id_user,data_creation,lot_name,description,image,start_cost,data_stop,shag_sravka) value (NULL,($query1),1,now(),'$lot_name','$description','$image',$start_cost,'$data_stop',$shag_sravka)";

        $category_result = $connection->query($query);

        $query2 = "SELECT id_lot from lot where lot_name ='".$lot_name."'";

        $result2 = $connection->query($query2);

        $ID = $result2->fetch_row()[0];

        header("location:lot.php?pages=$ID");
    }

    $data_main = ['categories'=>$categories,'err'=>$err,'message'=>$message,'form'=>$form];

    $main = include_template("add.php", $data_main);

    $layout_content = include_template('layout.php', [
        'main' => $main,
        'categories' => $categories,
        'arrayusers' =>$arrayusers,
        'title' => 'Добавление лота',
        'user_name' => $user
    ]);
    print($layout_content);
}
else
{
    $data_main = ['categories'=>$categories,'err'=>$err,'message'=>$message,'form'=>$form];

    $main = include_template("add.php", $data_main);

    $layout_content = include_template('layout.php', [
        'main' => $main,
        'categories' => $categories,
        'arrayusers' =>$arrayusers,
        'title' => 'Добавление лота',
        'user_name' => $user
    ]);

    print($layout_content);
}
}
?>