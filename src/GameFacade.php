<?php


namespace App;


use App\Data\Games;
use App\Data\Players;
use App\Filter\FilterDate;
use App\Filter\FilteredGameList;
use App\Filter\FilterSeasons;
use App\Rule\GameSearchRules;
use App\Rule\HomeTeamWonRule;
use App\Rule\SameConferenceRule;

class GameFacade
{
    private function showGameData(array $game, array $players)
    {
        $printer = new Printer();
        $printer->writeSeparator();
        $printer->writeLn('Home team: ' . $game['home_team']['full_name'] . ' Score :' . $game['home_team_score'] .
            ' | Visitor team:  ' . $game['visitor_team']['full_name'] . ' Score :' . $game['visitor_team_score']);
        $printer->writeLn($game['home_team']['full_name'] . ' players:');
        foreach ($players['home'] as $player) {
            $printer->writeLn("\t" . $player);
        }
        $printer->writeLn($game['visitor_team']['full_name'] . ' players:');
        foreach ($players['visitor'] as $player) {
            $printer->writeLn("\t" . $player);
        }
    }

    public function filterGames(array $options, string $input): array
    {
        $gamesFilter = new FilteredGameList();
        $gamesTemplate = new Games();
        $filter = $options['filter'] ?? null;

        if ($filter === 'date') {
            $gamesFilter->setGameFilter(new FilterDate($gamesTemplate));
        } elseif ($filter === 'season') {
            $gamesFilter->setGameFilter(new FilterSeasons($gamesTemplate));
        } else {
            $gamesFilter->setGameFilter(new FilterDate($gamesTemplate));
        }
        return $gamesFilter->filter($input);
    }

    public function applySearchRules(array $games): array
    {
        $gamesSearchRules = new GameSearchRules();
        $gamesSearchRules->setGameRule(new HomeTeamWonRule(), new SameConferenceRule());
        return $gamesSearchRules->executeRule($games);
    }

    public function showGamesDataWithPlayers(array $games): void
    {
        $players = new Players();
        foreach ($games as $game) {
            $this->showGameData($game, $players->getPlayers($game));
        }
    }
}