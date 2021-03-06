<?php

declare(strict_types=1);

namespace Tests;

use Monkey\Ast\Expressions\IdentifierExpression;
use Monkey\Ast\Program;
use Monkey\Ast\Statements\LetStatement;
use Monkey\Ast\Types\IntegerLiteral;
use Monkey\Token\Token;
use Monkey\Token\TokenType;

test('toString', function () {
    $program = new Program();

    $program->addStatement(
        new LetStatement(
            new Token(TokenType::T_LET, 'let'),
            new IdentifierExpression(new Token(TokenType::T_IDENT, 'foo'), 'foo'),
            new IntegerLiteral(new Token(TokenType::T_INT, '10'), 10)
        )
    );

    assertSame('let foo = 10;', $program->toString());
});
