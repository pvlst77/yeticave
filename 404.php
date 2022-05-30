<?php
require_once ('functions.php');
require_once ('data.php');

$data_main = ['categories'=>$categories];

$main = include_template("add.php", $data_main);

$layout_content = include_template('layout.php', [
    'main' => $main,
    'categories'=>$categories,
    'arrayusers' =>$arrayusers,
    'title' => 'Добавление лота',
    'user_name' => $user
]);
print($layout_content);
?>