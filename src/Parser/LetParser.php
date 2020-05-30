<?php

declare(strict_types=1);

namespace Monkey\Parser;

use Monkey\Ast\Identifier;
use Monkey\Ast\LetStatement;
use Monkey\Token\TokenType;
use Monkey\Token\TokenType;

final class LetParser
{
    private Parser $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function parse(): ?LetStatement
    {
        $token = $this->parser->curToken;

        if (!$this->parser->peekTokenIs(TokenType::from(TokenType::T_IDENT))) {
            return null;
        }

        $name = new Identifier(
            $this->parser->curToken,
            $this->parser->curToken->literal->value
        );

        if (!$this->parser->peekTokenIs(TokenType::from(TokenType::T_ASSIGN))) {
            return null;
        }
    }
}
