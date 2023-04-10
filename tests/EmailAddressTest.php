<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function testEmailAddress(): void
    {
        $email = 'a@example.com';
        $emailAddress = EmailAddress::fromString($email);
        $this->assertSame($email, $emailAddress->email);
    }

    public function testEmailAddressEmpty(): void
    {
        $email = '';
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a value to be a valid e-mail address. Got: ""');
        EmailAddress::fromString($email);
    }

    public function testEmailAddressInvalid(): void
    {
        $email = 'a@a';
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a value to be a valid e-mail address. Got: "a@a"');
        EmailAddress::fromString($email);
    }
}
