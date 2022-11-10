<?php
namespace App\A3Ftest;

require_once 'C:\Users\michel\PhpstormProjects\A3Ftest-laravel\itproger\vendor\autoload.php';


$parser = new HTML_tag_parser_class();

$tag_array = $parser->parser('https://vkbot24.ru');
var_dump($tag_array);


