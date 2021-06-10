<?php declare(strict_types=1);


namespace App\Data;


class Players
{
    private function playerFullName(array $stat): string
    {
        return $stat['player']['first_name'] . " " . $stat['player']['last_name'];
    }

    private function isHomeTeamPlayer(array $stat, array $game): bool
    {
        return $stat['team']['id'] === $game['home_team']['id'];
    }

    public function getPlayers($game): array
    {
        $statsTemplate = new Stats();
        $stats = $statsTemplate->getAllValues("game_ids[]", $game['id']);

        $players = array(
            'home' => array(),
            'visitor' => array()
        );
        foreach ($stats as $stat) {
            if ($this->isHomeTeamPlayer($stat, $game)) {
                array_push($players['home'], $this->playerFullName($stat));
            } else {
                array_push($players['visitor'], $this->playerFullName($stat));
            }
        }
        return $players;
    }
}