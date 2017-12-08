<?php
    $Computer_lines=file("Computer.txt");

    header("Content-type: application/xml");
    print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    print "<HardWares>\n";

    for($i = 0 ; $i < Count($Computer_lines) ; $i++){
        list($name , $price , $location) = explode("|",trim($Computer_lines[$i]));

        print "\t<HardWare>\n";
        print "\t\t<name>$name</name>\n";
        print "\t\t<price>$price</price>\n";
        print "\t\t<location>$location</location>\n";
        print "\t</HardWare>\n";
    }

    print "</HardWares>";
?>