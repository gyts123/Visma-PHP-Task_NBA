<?php declare(strict_types=1);


namespace App\Data;


use App\RapidApiClient;

class Teams extends RapidApiClient
{
    public function getValues(string $filterParam = "", mixed $filterData = "", int $page = 1): ?array
    {
        $url = $filterParam === "" || $filterData === "" ? "teams?page=$page" : "teams?$filterParam=$filterData&page=$page";
        $response = $this->makeGetRequest($url);
        return $response === null || $response['meta']['total_count'] !== 0 ? $response : null;
    }
}