openlibrary.org is our book database

BookData 
    -class holds book information we want to send to the requester.

BookController
    - Has the GET API endpoint
    - The handleGet method checks the request body
        -if the body has 'key' it calls BookCalls's getBooks method
            -example
                {
                    "key": "OL45804W"
                }
                or
                {
                    "key": [
                        "OL45804W",
                        "OL98459W"
                    ]
                }
        -if the body has 'search' it calls the BookCalls's searchBooks method
            -example
                {
                    "search": "the+lord+of+the+rings"
                }

BookCalls
    -class gets the book information from openlibrary.org and converts it to book data objects
    -searchBooks method takes the search request and converts the results into a array of BookData sending back at most 100 BookData
    -getBooks method takes the keys given and makes a BookData object for every key and sends the BookData back.
    -getApiCall takes a url and gets that information from the openlibrary.org
        -these lines of code were used so much I made it its own method to be called within searchBooks and getBooks