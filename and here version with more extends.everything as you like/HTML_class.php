<?php


namespace App;


class HTML_class
{
    protected string $url;
    protected string $html;
    protected int $HTMLsize;

    protected function setHtml($url)
    {
        $this->url=$url;
        $this->html = file_get_contents($this->url);
        $this->HTMLsize = strlen($this->html);

    }
}
