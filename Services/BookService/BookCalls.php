<?php

class BookCalls
{
    private $searchRequest;

    function set_searchRequest($searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }
    function getBooks()
    {
        $url = 'https://openlibrary.org/search.json?q=' . $this->searchRequest;

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $searchData = json_decode($response);

        echo $searchData->docs[0]->title;

    }
    function getBook(){
        
    }
}


?>