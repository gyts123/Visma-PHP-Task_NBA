<?php declare(strict_types=1);


namespace App\Data;


use App\RapidApiClient;

class Games extends RapidApiClient
{
    public function getValues(string $filterParam = "", mixed $filterData = "", int $page = 1): ?array
    {
        $url = $filterParam === "" || $filterData === "" ? "games?page=$page" : "games?$filterParam=$filterData&page=$page";
        $response = $this->makeGetRequest($url);
        return $response === null || $response['meta']['total_count'] !== 0 ? $response : null;
    }
}