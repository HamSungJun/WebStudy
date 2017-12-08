<?


header( "content-type: application/xml; charset=UTF-8" );

$XML = new DOMDocument();
$Album = $XML->createElement("Album");
$Album -> setAttribute("artitst","Buzz");
$Track = $XML->createElement("Track","겁쟁이");

?>
