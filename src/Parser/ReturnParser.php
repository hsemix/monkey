<?php

declare(strict_types=1);

namespace Monkey\Parser;

use Monkey\Ast\ReturnStatement;
use Monkey\Token\TokenType;

final class ReturnParser
{
    public function __invoke(Parser $parser): ReturnStatement
    {
        $token = $parser->curToken;

        $parser->nextToken();

        while (!$parser->curTokenIs(TokenType::T_SEMICOLON)) {
            $parser->nextToken();
        }

        return new ReturnStatement($token);
    }
}
