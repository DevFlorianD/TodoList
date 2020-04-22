<?php

require_once 'src/Item.php';

class ItemTest extends PHPUnit\Framework\TestCase
{
    public function testIsValid ()
    {
        $item = new Item('Item 1', 'Contenu');
        $this->assertTrue($item->isValid());
    }
}