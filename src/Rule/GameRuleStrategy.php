<?php declare(strict_types=1);


namespace App\Rule;


abstract class GameRuleStrategy
{
    abstract public function executeRule(array $input): array;
}