<?php

declare(strict_types=1);

namespace Monkey\Evaluator;

use Monkey\Ast\Statements\BlockStatement;
use Monkey\Object\InternalObject;
use Monkey\Object\NullObject;
use Monkey\Object\ReturnValueObject;

final class EvalBlockStatement
{
    private Evaluator $evaluator;

    public function __construct(Evaluator $evaluator)
    {
        $this->evaluator = $evaluator;
    }

    public function __invoke(BlockStatement $node): InternalObject
    {
        $result = NullObject::instance();

        foreach ($node->statements() as $statement) {
            $result = $this->evaluator->eval($statement);

            if ($result instanceof ReturnValueObject) {
                return $result;
            }
        }

        return $result;
    }
}
