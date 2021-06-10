<?php declare(strict_types=1);


namespace App\Filter;


use App\Data\Games;

abstract class GameFilterStrategy
{
    protected Games $gamesTemplate;

    public function __construct(Games $gamesTemplate)
    {
        $this->gamesTemplate = $gamesTemplate;
    }

    abstract public function filter(string $input): array;
}