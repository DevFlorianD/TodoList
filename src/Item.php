<?php

class Item
{
    private $nom;
    private $content;
    private $createdAt;

    function __construct($nom, $content)
    {
        $this->nom = $nom ;
        $this->content = $content;
        $this->createdAt = new \DateTime('NOW');
    }


    private function isValidContent(){
        if (strlen($this->content) >= 1000){
            return false;
        }
        return true;
    }

    private function isNotEmpty($var)
    {
        if (!strlen($var) > 0) {
             return false;
        }
        return true;
    }


    public function isValid() {
        if (
            $this->isNotEmpty($this->nom) &&
            $this->isValidContent()
        ){
            return true;
        }
        return false;
    }
}