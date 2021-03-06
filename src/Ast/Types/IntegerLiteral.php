<?php

declare(strict_types=1);

namespace Monkey\Ast\Types;

use Monkey\Ast\Expressions\Expression;
use Monkey\Token\Token;

final class IntegerLiteral extends Expression
{
    private int $value;

    public function __construct(Token $token, int $value)
    {
        $this->token = $token;
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->tokenLiteral();
    }
}
