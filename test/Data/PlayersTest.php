<?php

namespace AppTest\Data;

use App\Data\Players;
use PHPUnit\Framework\TestCase;

class PlayersTest extends TestCase
{
    public function testGetPlayers(): void
    {
        $game = array(
            'id' => 264792,
            'date' => '2021-05-16T00:00:00.000Z',
            'home_team' => array(
                'id' => 10,
                'abbreviation' => 'GSW',
                'city' => 'Golden State',
                'conference' => 'West',
                'division' => 'Pacific',
                'full_name' => 'Golden State Warriors',
                'name' => 'Warriors',
            ),
            'home_team_score' => 113,
            'period' => 4,
            'postseason' => '',
            'season' => 2020,
            'status' => 'Final',
            'time' => '',
            'visitor_team' => array(
                'id' => 15,
                'abbreviation' => 'MEM',
                'city' => 'Memphis',
                'conference' => 'West',
                'division' => 'Southwest',
                'full_name' => 'Memphis Grizzlies',
                'name' => 'Grizzlies',
            ),
            'visitor_team_score' => 101
        );

        $players = new Players();
        $actual = $players->getPlayers($game);

        $this->assertNotEmpty($actual);

    }
}
