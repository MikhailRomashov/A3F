<?php

use App\HTML_parser_tag;

require "HTML_parser_tag.php";

$parser = new HTML_parser_tag('https://vkbot24.ru');

$tag_array = $parser->parser();
var_dump($tag_array);


