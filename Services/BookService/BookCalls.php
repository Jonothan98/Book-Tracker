<?php

class BookCalls
{
    private $searchRequest;
    private $workKey;

    public function setSearchRequest($searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }

    public function setWorkKey($workKey)
    {
        $this->workKey = $workKey;
    }

    private function getApiCall($url){
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $searchData = json_decode($response);

        return $searchData;

    }
    public function searchBooks()
    {
        $url = 'https://openlibrary.org/search.json?q=' . $this->searchRequest;

        $searchData = $this->getApiCall($url);

        echo $searchData->docs[0]->title;

    }
    public function getBooks()
    {
        $worksData =[];
        if (is_array($this->workKey)) {
            foreach($this->workKey as $key){
                $url = 'https://openlibrary.org/works/' . $key . '.json';
                $worksData[] = $this->getApiCall($url);
            }
        } else {
            $url = 'https://openlibrary.org/works/' . $this->workKey . '.json';
    
            $worksData = $this->getApiCall($url);
        }

        echo json_encode($worksData);
    }
}


?>