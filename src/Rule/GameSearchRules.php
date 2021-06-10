<?php declare(strict_types=1);


namespace App\Rule;


class GameSearchRules
{
    private array $ruleStrategies;

    public function setGameRule(GameRuleStrategy ...$ruleStrategies): void
    {
        $this->ruleStrategies = $ruleStrategies;
    }

    public function executeRule(array $array): array
    {
        foreach ($this->ruleStrategies as $ruleStrategy) {
            $array = $ruleStrategy->executeRule($array);
        }
        return $array;
    }
}