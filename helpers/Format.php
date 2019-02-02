<?php
class Format
{
    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 398){
       
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '))."...";
        return $text;
    }
}
