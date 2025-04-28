<?php
include 'BookData.php';
class BookCalls
{
    private $bookData = ""; 
    public function searchBooks($searchRequest)
    {
        $url = 'https://openlibrary.org/search.json?q=' . $searchRequest;

        $searchData = $this->getApiCall($url);

        echo json_encode($searchData);

    }
    public function getBooks($workKey)
    {
        $worksData = [];
        if (is_array($workKey)) {
            foreach ($workKey as $key) {
                $url = 'https://openlibrary.org/works/' . $key . '.json';
                $worksData[] = $this->getApiCall($url);
            }
        } else {
            $url = 'https://openlibrary.org/works/' . $workKey . '.json';

            $worksData = $this->getApiCall($url);
            $authorData = $this->getApiCall('https://openlibrary.org/'. $worksData->authors->author->key .'.json');
            $this->bookData = new BookData($workKey,$worksData->title,$authorData->name,$worksData->covers[0]);
        }

        echo json_encode($worksData);
    }
    private function getApiCall($url)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        $searchData = json_decode($response);

        return $searchData;

    }
}


?>