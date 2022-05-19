<?php
require_once ('functions.php');
require_once "data.php";

    $ID = $_GET['pages'];

    $connection = new mysqli('127.0.0.1','root','','yeticave');
    $query = "Select * from categorie order by id_categorie";
    $category_result = $connection->query($query);
    $category = $category_result->fetch_all(MYSQLI_ASSOC);

    $query = "SELECT lot_name,id_lot, categorie.name, description, image, start_cost FROM lot INNER JOIN categorie on lot.id_categorie = categorie.id_categorie where id_lot=$ID";
    $lot_result = $connection->query($query);
    $lot = $lot_result->fetch_array(1);

    $query = "Select name,summa, date
    from stavka b
        inner join user u on b.id_user = u.id_user
    where b.id_lot=$ID";
    $bets_result = $connection->query($query);
    $bets = $bets_result->fetch_all(1);

    $data_main = ['category'=>$category, 'lot'=>$lot,'bets'=>$bets];

    $main = include_template("lot.php", $data_main);

    $layout_content = include_template('layout.php', [
        'main' => $main,
        'categories'=>$categories,
        'title' => $lot["lot_name"],
        'is_auth'=>$is_auth,
        'user_name' => $user_name
    ]);

    if($lot["id_lot"] != $ID)
    {
        header("Location: 404.php");
    }
    else
    {
        print $layout_content;
    }

?>