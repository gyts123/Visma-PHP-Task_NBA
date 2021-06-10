<?php declare(strict_types=1);


namespace App\Rule;


class HomeTeamWonRule extends GameRuleStrategy
{
    public function executeRule(array $input): array
    {
        return $this->getGamesWhereHomeTeamWon($input);
    }

    private function getGamesWhereHomeTeamWon(array $games): array
    {
        return array_filter($games, function ($game) {
            return $game['home_team_score'] > $game['visitor_team_score'];
        });
    }
}