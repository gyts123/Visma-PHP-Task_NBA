<?php declare(strict_types=1);

namespace App;

class Printer
{
    public function write(string $string): void
    {
        echo $string;
    }

    public function writeLn(string $string): void
    {
        echo $this->write($string) . "\n";
    }

    public function writeSeparator(): void
    {
        echo str_repeat("=", 100) . "\n";
    }
}
