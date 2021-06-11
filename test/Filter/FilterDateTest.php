<?php

namespace AppTest\Filter;

use App\Data\Games;
use App\Filter\FilterDate;
use App\Filter\FilteredGameList;
use PHPUnit\Framework\TestCase;

class FilterDateTest extends TestCase
{
    public function testFilter(): void
    {
        $gamesFilter = new FilteredGameList();
        $games = new Games();
        $gamesFilter->setGameFilter(new FilterDate($games));

        $date = '2021-05-16';

        $gamesHaveSpecifiedDate = true;

        foreach ($gamesFilter->filter($date) as $game) {
            if (!(date('Y-m-d', strtotime($game['date'])) === $date)) {
                $gamesHaveSpecifiedDate = false;
                break;
            }
        }
        $this->assertTrue($gamesHaveSpecifiedDate);
    }
}
