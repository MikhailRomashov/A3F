<?php
namespace App;

require "HTML_tag_parser_class.php";

$parser = new HTML_tag_parser_class();

$tag_array = $parser->parser('https://vkbot24.ru');
var_dump($tag_array);


