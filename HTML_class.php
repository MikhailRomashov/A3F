<?php


namespace App\A3Ftest;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

class HTML_class
{
    protected string $url;
    protected string $html;
    protected int $HTMLsize;

    protected function setHtml($url)
    {
        $this->url=$url;

        $this->html = file_get_contents($this->url);// или через guzzle
        $this->HTMLsize = strlen($this->html);

    }
}
