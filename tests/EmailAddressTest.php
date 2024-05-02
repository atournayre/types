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
        self::assertSame($email, $emailAddress->toString());
    }

    public function testEmailAddressEmpty(): void
    {
        $email = '';
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a value to be a valid e-mail address. Got: ""');
        EmailAddress::fromString($email);
    }

    public function testEmailAddressInvalid(): void
    {
        $email = 'a@a';
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a value to be a valid e-mail address. Got: "a@a"');
        EmailAddress::fromString($email);
    }

    public function testUsername(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertSame('username', $emailAddress->username());
    }

    public function testDomain(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertSame('domain.com', $emailAddress->domain());
    }

    public function testUsernameIs(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertTrue($emailAddress->usernameIs('username'));
    }

    public function testUsernameIsNot(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertFalse($emailAddress->usernameIs('notusername'));
    }

    public function testDomainIs(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertTrue($emailAddress->domainIs('domain.com'));
    }

    public function testDomainIsNot(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertFalse($emailAddress->domainIs('example.com'));
    }

    public function testSameness(): void
    {
        $email = 'username@domain.com';
        $emailAddress = EmailAddress::fromString($email);
        self::assertTrue($emailAddress->is($email));

        $email2 = EmailAddress::fromString($email);
        self::assertTrue($emailAddress->is($email2));
    }
}
