<?php
include 'BookData.php';
class BookCalls
{
    private $bookData = "";
    private $booksData = [];
    public function searchBooks($searchRequest)
    {
        $url = 'https://openlibrary.org/search.json?q=' . $searchRequest;

        $searchData = $this->getApiCall($url);

        $docsCount = count($searchData->docs) >= 100 ? 100 : count($searchData->docs);
        array_push($this->booksData, $docsCount);

        for ($i = 0; $i < 100; $i++) {
            $worksData = $searchData->docs[$i];
            $key = str_replace("/works/", "", $worksData->key);
            $cover = isset($worksData->cover_i) ? $worksData->cover_i : "N/A";
            $author = isset($worksData->author_name[0]) ? $worksData->author_name[0] : "N/A";
            array_push($this->booksData, new BookData($key, $worksData->title, $author, $cover));
        }
        echo json_encode($this->booksData);

    }
    public function getBooks($workKey)
    {
        if (is_array($workKey)) {
            foreach ($workKey as $key) {
                $url = 'https://openlibrary.org/works/' . $key . '.json';
                $worksData = $this->getApiCall($url);
                $authorData = $this->getApiCall('https://openlibrary.org' . $worksData->authors[0]->author->key . '.json');
                array_push($this->booksData, new BookData($key, $worksData->title, $authorData->name, $worksData->covers[0]));
            }
            echo json_encode($this->booksData);
        } else {
            $url = 'https://openlibrary.org/works/' . $workKey . '.json';

            $worksData = $this->getApiCall($url);
            $authorData = $this->getApiCall('https://openlibrary.org' . $worksData->authors[0]->author->key . '.json');
            $this->bookData = new BookData($workKey, $worksData->title, $authorData->name, $worksData->covers[0]);
            echo json_encode($this->bookData);
        }
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