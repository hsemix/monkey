<?php

declare(strict_types=1);

namespace Monkey\Token;

use ReflectionClass;

final class TokenType
{
    public const T_EOF = 0;
    public const T_ILLEGAL = -1;

    // Identifiers and literals
    public const T_IDENT = 0x100;
    public const T_INT = 0x101;
    public const T_FLOAT = 0x102;
    public const T_STRING = 0x103;

    // Operators
    public const T_ASSIGN = 0x200;
    public const T_PLUS = 0x201;
    public const T_MINUS = 0x202;
    public const T_ASTERISK = 0x203;
    public const T_SLASH = 0x204;
    public const T_MODULO = 0x205;

    // Logical operators
    public const T_NOT = 0x300;
    public const T_AND = 0x301;
    public const T_OR = 0x3002;

    // Delimiters
    public const T_COMMA = 0x400;
    public const T_SEMICOLON = 0x401;

    // Parentheses, braces and brackets
    public const T_LPAREN = 0x500;
    public const T_RPAREN = 0x501;
    public const T_LBRACE = 0x502;
    public const T_RBRACE = 0x503;
    public const T_LBRACKET = 0x504;
    public const T_RBRACKET = 0x505;

    // Comparision operators
    public const T_LT = 0x600;
    public const T_GT = 0x601;
    public const T_EQ = 0x602;
    public const T_LT_EQ = 0x603;
    public const T_GT_EQ = 0x604;
    public const T_NOT_EQ = 0x605;

    // Keywords
    public const T_FN = 0x700;
    public const T_LET = 0x701;
    public const T_TRUE = 0x702;
    public const T_FALSE = 0x703;
    public const T_IF = 0x704;
    public const T_ELSE = 0x705;
    public const T_RETURN = 0x706;

    private const TOKEN_MAP = [
        '=' => self::T_ASSIGN,
        '+' => self::T_PLUS,
        '-' => self::T_MINUS,
        '!' => self::T_NOT,
        '*' => self::T_ASTERISK,
        '%' => self::T_MODULO,
        '/' => self::T_SLASH,

        ',' => self::T_COMMA,
        ';' => self::T_SEMICOLON,

        '(' => self::T_LPAREN,
        ')' => self::T_RPAREN,
        '{' => self::T_LBRACE,
        '}' => self::T_RBRACE,
        '<' => self::T_LT,
        '>' => self::T_GT,
        '[' => self::T_LBRACKET,
        ']' => self::T_RBRACKET,

        '>=' => self::T_GT_EQ,
        '<=' => self::T_LT_EQ,
        '==' => self::T_EQ,
        '!=' => self::T_NOT_EQ,

        '&&' => self::T_AND,
        '||' => self::T_OR,

        'fn' => self::T_FN,
        'let' => self::T_LET,
        'true' => self::T_TRUE,
        'false' => self::T_FALSE,
        'if' => self::T_IF,
        'else' => self::T_ELSE,
        'return' => self::T_RETURN,
    ];

    public static function name(int $type): string
    {
        static $constants;
        $name = \array_search(
            $type, $constants ??= (new ReflectionClass(self::class))->getConstants(), true
        );

        return \is_string($name) ? $name : 'T_ILLEGAL';
    }

    public static function lookupToken(string $ch, int $default = null): ?int
    {
        return self::TOKEN_MAP[$ch] ?? $default ?? null;
    }

    public static function isSingleCharToken(string $ch): bool
    {
        return self::lookupToken($ch) && 1 === \mb_strlen($ch);
    }
}
