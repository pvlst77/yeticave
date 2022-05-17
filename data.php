<?php
    $link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
    mysqli_set_charset($link, utf8);

    $sql = 'SELECT * FROM categorie';
    $result = mysqli_query($link, $sql);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $sql_1 = 'SELECT * FROM lot';
    $result_1 = mysqli_query($link, $sql_1);

    $announcements = mysqli_fetch_all($result_1, MYSQLI_ASSOC);