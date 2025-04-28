<?php

class BookData
{
    private $key;
    private $title;
    private $author;
    private $cover;

    function __construct($key, $title, $author, $cover)
    {
        $this->key = $key;
        $this->title = $title;
        $this->author = $author;
        $this->cover = $cover;
    }
}

