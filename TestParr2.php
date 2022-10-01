<?php


use App\Parr2;
require('Parr2.php');



$parser = new Parr2('https://vkbot24.ru');



do
{
    $result = $parser -> parser();

    if($result['status'] == 'success') $tag_array[$result['tag']]++;

}while($result['status'] == 'success');
var_dump($tag_array);


