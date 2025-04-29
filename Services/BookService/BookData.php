<?php

class BookData
{
    public $key;
    public $title;
    public $author;
    public $cover;

    public function __construct($key, $title, $author, $cover)
    {
        $this->key = $key;
        $this->title = $title;
        $this->author = $author;
        $this->cover = $cover;
    }
}

