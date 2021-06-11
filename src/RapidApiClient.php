<?php declare(strict_types=1);

namespace App;

use Exception;

abstract class RapidApiClient
{
    // Readme in https://rapidapi.com/theapiguy/api/free-nba/details
    private string $baseUrl = 'https://free-nba.p.rapidapi.com/';
    private string $key = '4fdb2c4532msh98db9d8739bd30ap17c82cjsn4e79f97aab5a';
    /**
     * @throws Exception
     */
    protected function makeGetRequest(string $url){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->baseUrl . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: free-nba.p.rapidapi.com",
                "x-rapidapi-key: " . $this->key
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            throw new Exception("cURL Error #:" . $err);
        }

        return json_decode($response, true);
    }

    public function getAllValues(string $filterParam = "", mixed $filterData = ""): ?array
    {
        $allValues = array();
        $current_page = 1;

        while (!is_null($values = $this->getValues($filterParam, $filterData, $current_page)) && $values['meta']['total_pages'] >= $current_page) {
            $allValues = array_merge($allValues, $values['data']);
            $current_page++;
        }
        return $allValues;
    }

    abstract function getValues(string $filterParam, mixed $filterData, int $page): ?array;
}
