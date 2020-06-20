<?php

declare(strict_types=1);

namespace Monkey\Object;

final class ErrorObject implements InternalObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function type(): string
    {
        return self::BOOLEAN_OBJ;
    }

    public function inspect(): string
    {
        return "ERROR: {$this->value}";
    }

    public static function notAFunction(string $name): self
    {
        return new self("not a function: {$name}");
    }

    public static function unknownOperator(string ...$args): self
    {
        return new self('unknown operator: '.\implode(' ', $args));
    }

    public static function typeMismatch(string ...$args): self
    {
        return new self('type mismatch: '.\implode(' ', $args));
    }

    public static function identifierNotFound(string $name): self
    {
        return new self("identifier not found: {$name}");
    }

    public static function wrongNumberOfArguments(int $got, int $want): self
    {
        return new self(\Safe\sprintf('wrong number of arguments. got=%s, want=%s', $got, $want));
    }

    public static function invalidArgument(string $to, string $got): self
    {
        return new self(\Safe\sprintf('argument to "%s" not supported, got %s', $to, $got));
    }
}
