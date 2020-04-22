<?php

require_once 'src/User.php';
require_once 'src/Item.php';

class EmailService
{
    function sendEmail (User $user)
    {
        return $user->isValidToSendEmail();
    }
}