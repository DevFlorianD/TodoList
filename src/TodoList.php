<?php

class TodoList
{
    public $id;
    public $items = [];
    public $user;

    function __construct($id,$items,$user)
    {
        $this->id = $id ;
        $this->items = $items;
        $this->user = $user;
    }

    function intervallBetweenTwoDates($date1,$date2){
        $to_time = strtotime($date1);
        $from_time = strtotime($date2);
        return (round(abs($to_time - $from_time) / 60,2));
    }

    function validIntervall($item){
        foreach ($this->items as $value){
            if ($this->intervallBetweenTwoDates($value->date,$item->date) < 30){
                return false;
            }
        }

        return true;
    }

    function canAddItem($item)
    {
        if (!(count($this->items) >= 10) && $this->validIntervall($item)) {
            return null;
        }

        if (!in_array($item,$this->items) && $item->isValid()) {
            $this->items[] = $item;
        }
        return $item;
    }

    function canSendItem($item){

        $serviceMailer = new EmailService;
        $serviceMailer->send($item,$this->user);

        return $item;
    }

}