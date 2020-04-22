<?php

require_once 'src/User.php';

class UserTest extends PHPUnit\Framework\TestCase

{
    public function testIsValid ()
    {
        $user = new User("florian@archionline.fr","Durand","Florian", "23", "password");
        $this->assertTrue($user->isValid());
    }
}