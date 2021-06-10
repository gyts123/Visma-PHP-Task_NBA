<?php declare(strict_types=1);


namespace App\Filter;


class FilteredGameList
{
    private GameFilterStrategy $filterStrategy;

    public function setGameFilter(GameFilterStrategy $filterStrategy) : void
    {
        $this->filterStrategy = $filterStrategy;
    }

    public function filter(string $input) : array
    {
        return $this->filterStrategy->filter($input);
    }
}