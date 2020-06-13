<?php

declare(strict_types=1);

namespace Monkey\Object;

final class IntegerObject implements InternalObject
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function type(): string
    {
        return self::INTEGER_OBJ;
    }

    public function inspect(): string
    {
        return \Safe\sprintf('%d', $this->value);
    }
}
