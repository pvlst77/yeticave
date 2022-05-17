<?php
    require_once('functions.php');
    require_once ('data.php');

    $main = include_template('index.php', [
        'categories' => $categories,
        'announcements' => $announcements,
        ]);

    $layout_content = include_template('layout.php', [
    'main' => $main,
    'categories'=>$categories,
    'title' => 'Главная страница',
    'is_auth'=>$is_auth,
    'user_name' => $user_name,
    ]);

    print($layout_content);
?>