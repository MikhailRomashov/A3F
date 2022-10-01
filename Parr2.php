<?php

namespace App;

class Parr2
{

    /**
     * @var
     */

    private $url;
    private $html;
    private $start;
    private $stop;
    private $prefix;
    private $suffix;
    private $HTMLsize;

    /**
     * Parr2 constructor.
     * @param $url
     */
    public function __construct($url)
    {

        if(!$url) return array('status'=>'error','err_mess'=>'emptyURL');

        $this->url = $url;
        $this->setHtml();

        if($this->html)
        {
            $this->prefix ="<";
            $this->suffix =">";
            $this->HTMLsize = strlen($this->html);
            return array('status'=>'success');
        }
        else
        {
            return array('status'=>'error','err_mess'=>'emptyHTML');
        }
    }


    /**
     * @return array|string[]
     */
    public function parser(): array
    {

        if (! isset($this->html) || ! is_string($this->html))
        {
            return array('status'=>'error','err_mess'=>'emptyHTML');
        }



        $last_tag='';


        while($this->stop < $this->HTMLsize - 1 && !$last_tag)
        {

            // находим ближайщй тег
            // начало тега
            $this->start = strpos($this->html, $this->prefix, $this->start);

            // конец тега
            $this->stop = strpos($this->html, $this->suffix, $this->start);

            // вычленяием тег c мусором
            $tag_raw = substr($this->html, $this->start + strlen($this->prefix), $this->stop - $this->start);

            // выделяем имя тега
            $tag = preg_split("/['>',' ']/", $tag_raw);

            //учитываем тег если он не закрывающий
            if (!str_starts_with($tag[0], "/")) $last_tag=$tag[0];

            // даем смещение для поиска след тега
            $this->start = $this->stop;

        }

        if($last_tag)
        {
            return array('status' => 'success', 'tag' => $last_tag);
        }
        else
        {
            return array('status' => 'error', 'err_mess' => 'noTag');
        }
    }


    /**
     *
     */
    private function setHtml(): void
    {
        $this->html = file_get_contents($this->url);

        //желательно сделать доп проверки содержания полученого хтмл
    }


}
?>
