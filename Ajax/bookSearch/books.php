<?php
// 2013041007 함성준
$BOOKS_FILE = "books.txt";

function filter_chars($str) {
	return preg_replace("/[^A-Za-z0-9_]*/", "", $str);
}

if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

$category = "";
$delay = 0;

if (isset($_REQUEST["category"])) {
	$category = filter_chars($_REQUEST["category"]);
}
if (isset($_REQUEST["delay"])) {
	$delay = max(0, min(60, (int) filter_chars($_REQUEST["delay"])));
}

if ($delay > 0) {
	sleep($delay);
}

if (!file_exists($BOOKS_FILE)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error - Unable to read input file: $BOOKS_FILE");
}



$XML = new DOMDocument();
$Books = $XML->createElement("Books");
$XML->appendChild($Books);
$lines = file($BOOKS_FILE);

for($i = 0 ; $i < Count($lines) ; $i++){
	// title category=?|author|year|price
	// Freakonomics|Steven Levitt|finance|2006|18.00
	list($title, $author, $book_category, $year, $price) = explode("|", trim($lines[$i]));
	if ($book_category == $category) {

	$XML_Book = $XML->createElement("book");
	$XML_Book -> setAttribute("category",$book_category);
	
	$XML_title = $XML->createElement("title");
	$XML_title_Text = $XML->createTextNode($title);

	$XML_author = $XML->createElement("author");
	$XML_author_Text = $XML->createTextNode($author);

	$XML_year = $XML->createElement("year");
	$XML_year_Text = $XML->createTextNode($year);

	$XML_price = $XML->createElement("price");
	$XML_price_Text = $XML->createTextNode($price);

	$XML_title->appendChild($XML_title_Text);
	$XML_author->appendChild($XML_author_Text);
	$XML_year->appendChild($XML_year_Text);
	$XML_price->appendChild($XML_price_Text);

	$XML_Book->appendChild($XML_title);
	$XML_Book->appendChild($XML_author);
	$XML_Book->appendChild($XML_year);
	$XML_Book->appendChild($XML_price);

	$Books->appendChild($XML_Book);
	}

};



header("Content-type: application/xml; encoding=\"UTF-8\"");
print $XML->saveXML();
/*
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
print "<books>\n";


$lines = file($BOOKS_FILE);
for ($i = 0; $i < count($lines); $i++) {
	list($title, $author, $book_category, $year, $price) = explode("|", trim($lines[$i]));
	if ($book_category == $category) {
		print "\t<book category=\"$category\">\n";
		print "\t\t<title>$title</title>\n";
		print "\t\t<author>$author</author>\n";
		print "\t\t<year>$year</year>\n";
		print "\t\t<price>$price</price>\n";
		print "\t</book>\n";		
	}
}
print "</books>";
*/

?>
