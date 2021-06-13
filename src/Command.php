<?php declare(strict_types=1);

namespace App;


use App\Data\Teams;

class Command
{
    public function executeHelp(): void
    {
        $printer = new Printer();
        $name = 'teams <team-keyword>';
        $description = 'List NBA teams';

        $printer->writeLn('Command: ' . $name);
        $printer->writeLn(str_pad(' ', 4) . $description);
        $printer->writeLn('');
    }

    public function teamsList(array $arguments): void
    {
        $printer = new Printer();
        $teamsTemplate = new Teams();
        $teams = $teamsTemplate->getValues();
        $filter = $arguments[0] ?? null;

        foreach ($teams['data'] as $team) {
            if ($filter !== null && (stristr($team['full_name'], $filter) || stristr($team['city'], $filter))) {
                $printer->writeLn('Team name: ' . $team['full_name'] . ' from ' . $team['city']);
            }
        }
    }

    public function gamesList(array $arguments, array $options): void
    {
        $printer = new Printer();
        $gameFacade = new GameFacade();

        $games = $gameFacade->filterGames($options, $arguments[0]);

        if (!empty($games)) {
            $games = $gameFacade->applySearchRules($games);
            $gameFacade->showGamesDataWithPlayers($games);
        } else {
            $printer->writeLn('No games were found at ' . $arguments[0]);
        }
    }


}
