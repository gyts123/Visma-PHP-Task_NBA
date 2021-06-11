<?php

namespace AppTest;

use App\GameFacade;
use PHPUnit\Framework\TestCase;

class GameFacadeTest extends TestCase
{
    private $games;

    protected function setUp(): void
    {
        $this->games = array(
            array(
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
            ),
            array(
                'id' => 264793,
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
            )
        );
    }

    public function testApplySearchRules(): void
    {
        $gameFacade = new GameFacade();

        $actual = $gameFacade->applySearchRules($this->games);

        $this->assertNotEmpty($actual);
    }

    public function testFilterGames(): void
    {
        $filter = "date";
        $input = "2021-05-16";
        $gameFacade = new GameFacade();

        $actual = $gameFacade->filterGames($filter, $input);

        $this->assertNotEmpty($actual);
    }

}
