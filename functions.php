<?php
require_once('data.php');
$is_auth = rand(0, 1);

function sum_format(int $cost){
    $cost=ceil($cost);
    if($cost>=1000){
        $cost = number_format($cost,0,"."," ");
    }
    return '<span class="lot__cost">'.$cost.'<b class="rub">₽</b></span>';
}

$user_name = 'hedonist'; // укажите здесь ваше имя
/*$categories = [
    [
        'eng' => 'boards',
        'rus' => 'Доски и лыжи',
    ],
    [
        'eng' => 'attachment',
        'rus' => 'Крепления',
    ],
    [
        'eng' => 'boots',
        'rus' => 'Ботинки',
    ],
    [
        'eng' => 'clothing',
        'rus' => 'Одежда',
    ],
    [
        'eng' => 'tools',
        'rus' => 'Инструменты',
    ],
    [
        'eng' => 'other',
        'rus' => 'Разное',
    ],
];*/
/*$announcements = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => '10990',
        'url' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'cost' => '159999',
        'url' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'cost' => '8000',
        'url' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'cost' => '10999',
        'url' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'cost' => '7500',
        'url' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'cost' => '5400',
        'url' => 'img/lot-6.jpg'
    ],
];*/
function sub_format ($number)
    {
        $number = ceil($number);
        if($number<1000)
        {
            $result = $number;
        }
        else
        {
            $result = number_format($number,0,","," ");
        }
        return $result.'<b class="rub">p</b>';
    }

    function timer()
    {
        $now = new DateTime('now');
        $nextdaynight = new DateTime('24:00');
        $interval = $now->diff($nextdaynight);
        if($interval ->format('%i')<10)
    {
        return $interval->format('%h:0%i');
    }
    else 
    {
        return $interval->format('%h:%i');
    }
    }
    
    function include_template($name, $data) {
        $name = 'templates/' . $name;
        $result = '';
        if (!file_exists($name)) {
            return $result;
        }
        ob_start();
        extract($data);
        require($name);
        $result = ob_get_clean();
        return $result;
    }