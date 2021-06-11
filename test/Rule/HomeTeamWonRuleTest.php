<?php

namespace AppTest\Rule;

use App\Rule\GameSearchRules;
use App\Rule\HomeTeamWonRule;
use PHPUnit\Framework\TestCase;

class HomeTeamWonRuleTest extends TestCase
{
    public function testExecuteRule(): void
    {
        $games = array(
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

        $gamesSearchRules = new GameSearchRules();
        $gamesSearchRules->setGameRule(new HomeTeamWonRule());

        $this->assertNotEmpty($gamesSearchRules->executeRule($games));
    }
}
