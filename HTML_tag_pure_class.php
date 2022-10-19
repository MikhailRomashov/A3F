<?php


namespace App;



class HTML_tag_pure_class extends HTML_tag_raw_class
{


    public function TagPure(): array
    {

        if($tag_raw=$this->TagRaw()['tag'])
        {
            $last_tag='';

            // выделяем имя тега
            $tag = preg_split("/['>',' ']/", $tag_raw);

            //учитываем тег если он не закрывающий
            if (!str_starts_with($tag[0], "/") && !str_contains($tag[0],'!')) $last_tag=$tag[0];

            return array('status'=>'success', 'tag'=>strtolower($last_tag));
        }
        else
        {
            return array('status'=>'tag_not_found');
        }

    }


}
