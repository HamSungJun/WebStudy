<?php

    $data_1 = "뭉뭉이";
    $data_2 = "멍몽이";
    define("ENTER","<br/>");
    echo PHP_VERSION;
    print ENTER;
    echo PHP_OS;
    print "<br/>";
    echo __LINE__;
    print "<br/>";
    echo __FILE__;
    print "<br/>";
    echo __DIR__;
    print "<br/>";
    echo __FUNCTION__;
    print "<br/>";
    echo __CLASS__;
    print "<br/>";
    echo __TRAIT__;
    print "<br/>";
    echo __METHOD__;
    print "<br/>";
    echo __NAMESPACE__;

    define("ENTER","<br/>");

    $Accounts[] = "";

    array_push($Accounts,"홍길동");
    array_push($Accounts,"홍길둥");
    array_push($Accounts,"홍길덩");
    array_push($Accounts,"홍길뎡");

    for ($i=0; $i < count($Accounts); $i++) { 
        print ($Accounts[$i] . "<br/>");
    }

    $member = array(
        "name" => array(),
        "color" => array()
    );

    $names[] = ["무궁화" , "진달래" , "봉선화"];
    $colors[] = ["블루" , "빨강" , "보라"];

    for ($i=0; $i < count($names); $i++) { 
        $member["name"] = $names[$i];
        $member["color"] = $colors[$i];
    }
    

    print($member);
    
    print_r($member);
    print("<br/>");

    // require 시키면 이 파일에 존재하는 변수나 함수도 가져다 사용할 수 있다.
    require "C:\Users\admin\Desktop\WebMaster\PHP\php+mysql\print5.php";

    function print_10()
    {
        print "<br/>". 10;
    }

    print_10();

    function Dog_Call(){
        print ($GLOBALS["data_1"]);
        print ($GLOBALS["data_2"]);


    }

    Dog_Call();

    $tel = "02-0000-0000";
    for ($i=1; $i < 11; $i++) { 
        print ("$i" . "<br/>");
    }
    $str = "등록";

    if ($str == "등록") {
        print ("등록하였습니다");
    }

    $Asso = array(
        "name" => "함철수",
        "tel" => $tel,
        "address" => "서울시 강남구"
    );

    foreach ($Asso as $key => $value) {
        print($Asso[$key]);
    }
    $Para_name = "함성준";
    
    function test($name){
        print ($name."님 안녕하세요" );
    }
    list($name , $tel , $addr) = $Asso["name"];
    print ($name); 
    test($Para_name);
    
    function date_printer(){
    print date("Y년 m월 d일 H시 I분 s초");
    }

    $clock = new EvTimer(1,1,date_printer());
    $clock::run();
?> 