<?php

class BookCalls
{
    private $searchRequest;
    private $workKey;

    public function setSearchRequest($searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }

    public function setWorkKey($workKey){
        $this->workKey = $workKey;
    }
    public function getBooks()
    {
        $url = 'https://openlibrary.org/search.json?q=' . $this->searchRequest;

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $searchData = json_decode($response);

        echo $searchData->docs[0]->title;

    }
    public function getBook(){
        $url = 'https://openlibrary.org/works/' . $this->workKey . '.json';

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $searchData = json_decode($response);

        echo $searchData->title;
    }
}


?>