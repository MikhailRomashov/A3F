<?php


namespace App;
require "HTML_parser.php";


class HTML_parser_tag implements HTML_parser
{
    /**
     * @var
     */
    private string $url;
    private string $html;
    private string $prefix;
    private string $suffix;

    private int $HTMLsize;
    private int $start;
    private int $stop;




    /**
     * HTMLClass constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->start = 0;
        $this->prefix = "<";
        $this->suffix = ">";
    }

    /**
     * @param $url
     * @return string[]
     */

    public function parser(): array
    {
        $this->setHtml();

        while($this->start < $this->HTMLsize-1)
        {
            $tag_array[$this->TagPure()]++;
        }

       return $tag_array;
    }

    public function TagPure(): string
    {
        $last_tag='';
        $tag_raw=$this->TagRaw();

        // выделяем имя тега
        $tag = preg_split("/['>',' ']/", $tag_raw);

        //учитываем тег если он не закрывающий
        if (!str_starts_with($tag[0], "/")) $last_tag=$tag[0];

        return $last_tag;
    }
    
    public function TagRaw(): string
    {

        // начало тега
        $this->start = strpos($this->html, $this->prefix, $this->start);

        // конец тега
        $this->stop = strpos($this->html, $this->suffix, $this->start);

        // вычленяием тег c мусором
        $tag_raw = substr($this->html, $this->start + strlen($this->prefix), $this->stop - $this->start);

        $this->start =$this->stop;

        // воззращаем тег
        return $tag_raw;
    }



    private function setHtml()
    {
        $this->html = file_get_contents($this->url);
        $this->HTMLsize = strlen($this->html);

    }
}
