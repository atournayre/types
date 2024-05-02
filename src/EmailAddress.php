<?php

namespace Atournayre\Types;

use Webmozart\Assert\Assert;

class EmailAddress extends StringType
{
    protected function __construct(string $email)
    {
        Assert::email($email);

        $this->string = $email;
    }

    public function is(string|self $email): bool
    {
        if ($email instanceof self) {
            return $this->string === $email->toString();
        }
        return $this->string === $email;
    }

    public function username(): string
    {
        return explode('@', $this->string)[0];
    }

    public function usernameIs(string $username): bool
    {
        return $this->username() === $username;
    }

    public function domain(): string
    {
        return explode('@', $this->string)[1];
    }

    public function domainIs(string $domain): bool
    {
        return $this->domain() === $domain;
    }

    public function isDeliverable(): bool
    {
        return checkdnsrr($this->domain());
    }
}
