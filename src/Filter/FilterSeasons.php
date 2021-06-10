<?php declare(strict_types=1);


namespace App\Filter;


class FilterSeasons extends GameFilterStrategy
{
    public function filter(string $input): array
    {
        return $this->gamesTemplate->getAllValues("seasons[]", $input);
    }
}