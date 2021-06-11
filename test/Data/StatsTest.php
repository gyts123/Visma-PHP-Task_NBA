<?php

namespace AppTest\Data;

use App\Data\Stats;
use PHPUnit\Framework\TestCase;

class StatsTest extends TestCase
{
    public function testGetValues(): void
    {
        $stats = new Stats();
        $actual = $stats->getValues();

        $this->assertNotEmpty($actual);
    }

    public function testGetValuesWithFilter(): void
    {
        $stats = new Stats();
        $actual = $stats->getValues('dates[]', '2021-05-16');

        $this->assertNotEmpty($actual);

    }
}
