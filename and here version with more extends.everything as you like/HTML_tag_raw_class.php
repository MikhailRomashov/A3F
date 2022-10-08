<?php


namespace App;
require "HTML_class.php";


class HTML_tag_raw_class extends HTML_class
{
    /**
     * @var
     */

    protected string $prefix;
    protected string $suffix;


    protected int $start;
    protected int $stop;




    /**
     * HTMLClass constructor.
     * @param $url
     */
    public function __construct()
    {
        $this->start = 0;
        $this->stop =0;
        $this->prefix = "<";
        $this->suffix = ">";
    }



    public function TagRaw($start = Null): array
    {
        $this->start = is_null($start) ?  $this->start : $start ;
        if($this->start >= $this->HTMLsize-1) return array('position'=>$this->start,'tag'=>'');

        // начало тега
        $this->start = strpos($this->html, $this->prefix, $this->start);

        // конец тега
        $this->stop = strpos($this->html, $this->suffix, $this->start);

        // вычленяием тег c мусором
        $tag_raw = substr($this->html, $this->start + strlen($this->prefix), $this->stop - $this->start);

        $this->start =$this->stop;

        // воззращаем тег и позицию
        return array('position'=>$this->start,'tag'=>$tag_raw);
    }




}
