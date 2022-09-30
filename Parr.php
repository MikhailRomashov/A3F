<?php

namespace App;

class Parr
{

    /**
     * @var
     */

    private $url;
    private $html;


    /**
     * @return array|string[]
     */
    public function parser(): array
    {

        $prefix="<";
        $suffix1=">";

        if (! isset($this->html) || ! is_string($this->html))
        {
            return array('status'=>'error','err_mess'=>'emptyPage');
        }

            do {
                // находим ближайщй тег
                // начало тега
                $start = strpos($this->html, $prefix, $start);
                if($start !== false)
                {
                    // конец тега
                    $stop = strpos($this->html, $suffix1, $start);

                    // вычленяием тег c мусором
                    $tag_raw = substr($this->html, $start + strlen($prefix), $stop - $start);

                    // выделяем имя тега
                    $tag = preg_split("/['>',' ']/", $tag_raw);

                    //учитываем тег если он не закрывающий
                    if (!str_starts_with($tag[0], "/")) $tag_array[$tag[0]]++;

                    // даем смещение для поиска след тега
                    $start = $stop;
                }
            }while($start);

            return array('status'=>'success','tags_array'=>$tag_array);
    }

    /**
     * @param $url
     * @return int|string[]
     */

    public function setUrl($url): array
    {
       if(!$url) return array('status'=>'error','err_mess'=>'emptyURL');
        $this->url = $url;
        $this->setHtml();
        return array('status'=>'success');
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
