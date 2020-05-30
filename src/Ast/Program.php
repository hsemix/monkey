<?php

declare(strict_types=1);

namespace Monkey\Ast;

final class Program
{
    /**
     * @var array<Statement>
     */
    private array $statements = [];

    public function statement(int $index): Node
    {
        return $this->statements[$index];
    }

    public function append(Statement $statement): void
    {
        $this->statements[] = $statement;
    }

    public function count(): int
    {
        return \count($this->statements);
    }
}