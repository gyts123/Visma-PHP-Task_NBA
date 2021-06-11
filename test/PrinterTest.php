<?php declare(strict_types=1);

namespace AppTest;

use App\Printer;
use PHPUnit\Framework\TestCase;

class PrinterTest extends TestCase
{
    public function testWrite(): void
    {
        $expected = "Something";

        $printer = new Printer();

        $this->expectOutputString($expected);
        $printer->write('Something');
    }

    public function testWriteLn(): void
    {
        $expected = "SomeLine\n";

        $printer = new Printer();

        $this->expectOutputString($expected);
        $printer->writeLn('SomeLine');
    }

    public function testWriteSeparator(): void
    {
        $expected = "====================================================================================================\n";

        $printer = new Printer();

        $this->expectOutputString($expected);
        $printer->writeSeparator();
    }
}
