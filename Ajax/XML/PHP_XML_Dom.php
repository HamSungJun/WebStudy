<?
$xmldoc = new DOMDocument();
$books_tag = $xmldoc->createElement("books");
$xmldoc ->appendChild($books_tag);
foreach($books as $book){
    
    $book_tag = $xmldoc -> createElement("book");
    $book_tag -> setAttribute("title" , $book["title"]);
    $book_tag -> setAttribute("author" , $book["author"]);
    $books_tag -> appendChild($book_tag);
    
}
header("Content-type: text/xml");
print $xmldoc ->saveXML();
?>

<!-- $xmldoc = new DOMDocument();                          #
$books_tag = $xmldoc->createElement("books");
$xmldoc->appendChild($books_tag);                     # <books>
foreach ($books as $book) {                                  
    $book_tag = $xmldoc->createElement("book");         #   <book
    $book_tag->setAttribute("title", $book["title"]);   #    title="Harry Potter" />
    $book_tag->setAttribute("author", $book["author"]); #    author="J.K. Rowling" />
    $books_tag->appendChild($book_tag);                      
}                                                     # </books>
header("Content-type: text/xml");
print $xmldoc->saveXML(); -->