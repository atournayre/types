<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testPasswordEmpty(): void
    {
        $password = '';
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected a different value than "".');
        Password::fromString($password);
    }

    public function testPassword(): void
    {
        $password = 'password';
        $this->assertSame($password, Password::fromString($password)->password);
    }
}
