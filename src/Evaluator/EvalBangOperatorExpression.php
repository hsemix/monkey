<?php

declare(strict_types=1);

namespace Monkey\Evaluator;

use Monkey\Object\BooleanObject;
use Monkey\Object\InternalObject;
use Monkey\Object\NullObject;

final class EvalBangOperatorExpression
{
    public function __invoke(InternalObject $right): InternalObject
    {
        if ($right instanceof BooleanObject) {
            return $right->value() ? BooleanObject::false() : BooleanObject::true();
        }

        if ($right instanceof NullObject) {
            return BooleanObject::true();
        }

        return BooleanObject::false();
    }
}