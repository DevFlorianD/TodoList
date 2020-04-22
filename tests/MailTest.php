<?php

require_once 'src/services/EmailService.php';
require_once 'src/User.php';

class MailTest extends PHPUnit\Framework\TestCase
{
    public function testSendEmail () {
        $emailService = new EmailService;

        $user = $this->createMock(User::class);

        $user
            ->method('isValidToSendEmail')
            ->willReturn((true));

        $this->assertTrue($emailService->sendEmail($user));
    }
}