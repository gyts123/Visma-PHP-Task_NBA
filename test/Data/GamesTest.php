<?php

namespace AppTest\Data;

use App\Data\Games;
use PHPUnit\Framework\TestCase;

class GamesTest extends TestCase
{
    public function testGetValues(): void
    {
        $games = new Games();
        $actual = $games->getValues();

        $this->assertNotEmpty($actual);

    }

    public function testGetValuesWithFilter(): void
    {
        $games = new Games();
        $actual = $games->getValues('dates[]', '2021-05-16');

        $this->assertNotEmpty($actual);

    }
}
