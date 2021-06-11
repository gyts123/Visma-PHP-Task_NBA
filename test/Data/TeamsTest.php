<?php

namespace AppTest\Data;

use App\Data\Teams;
use PHPUnit\Framework\TestCase;

class TeamsTest extends TestCase
{
    public function testGetValues(): void
    {
        $teams = new Teams();
        $actual = $teams->getValues();

        $this->assertNotEmpty($actual);
    }

    public function testGetValuesWithFilter(): void
    {
        $teams = new Teams();
        $actual = $teams->getValues('dates[]', '2021-05-16');

        $this->assertNotEmpty($actual);

    }
}
