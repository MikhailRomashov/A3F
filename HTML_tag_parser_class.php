<?php


namespace App\A3Ftest;


class HTML_tag_parser_class extends HTML_tag_pure_class implements HTML_parser_interface
{

    /**
     * @param string $url
     * @return array
     */

    public function parser($url): array
    {
        $this->setHtml($url);


        while(($result = $this->TagPure())['status'] == 'success')
        {
            if($result['tag']) $tag_array[$result['tag']]++;
        }

       return $tag_array;
    }







}
