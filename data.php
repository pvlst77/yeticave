<?php
    $link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
    mysqli_set_charset($link, 'utf8');

    $user = $_COOKIE['user'] ?? "";

    $sql = 'SELECT * FROM categorie';
    $result = mysqli_query($link, $sql);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $sql_1 = 'SELECT lot_name,id_lot, categorie.name, description, image, start_cost FROM lot INNER JOIN categorie on lot.id_categorie = categorie.id_categorie';
    $result_1 = mysqli_query($link, $sql_1);
    $announcements = mysqli_fetch_all($result_1, MYSQLI_ASSOC);

    $sql3 = "SELECT * FROM user where name = '$user'";
    $result3 = mysqli_query($link,$sql3);
    $arrayusers = mysqli_fetch_all($result3,MYSQLI_ASSOC);

  