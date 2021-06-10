<?php declare(strict_types=1);


namespace App\Rule;


class SameConferenceRule extends GameRuleStrategy
{
    public function executeRule(array $input): array
    {
        return $this->getGamesWhereSameConference($input);
    }

    private function getGamesWhereSameConference(array $games): array
    {
        return array_filter($games, function ($game) {
            return $game['home_team']['conference'] === $game['visitor_team']['conference'];
        });
    }
}