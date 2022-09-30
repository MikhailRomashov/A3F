<?php


use App\Parr;
require('Parr.php');



$parser = new Parr();

$status = $parser -> setUrl('https://vkbot24.ru');

if($status['status'] == 'success')
{
    $result = $parser -> parser();
}



