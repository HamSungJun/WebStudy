<?

    print "strlen is length of string ";
    print "strpos is index of string which in target string";
    print "substr is 은 문자열의 부분 문자열을 추출합니다.";
    print "strtolower는 모든 문자열을 소문자로 반환합니다.";
    print "strtoupper는 모든 문자열을 대문자로 반환합니다.";
    print "trim은 문자열에 존재하는 공백을 제거합니다.";

    $myString = "  MyMy String  ";

    print strlen($myString) ."<br>". strpos("S") ."<br>". substr(2,4) ."<br>". strtolower($myString) ."<br>". strtoupper($myString) ."<br>". trim($myString);    
    
    $name = null;

    if(isset($name)){
        print "i'm null";
    }
    
    
    
    // strlen	length
    // strpos	indexOf
    // substr	substring
    // strtolower, strtoupper	toLowerCase, toUpperCase
    // trim	trim

    

// count count(어레이이름) = 어레이의 크기 반환	number of elements in the array
// print_r (어레이 데이터 출력)	print array's contents
// array_pop, array_push, 어레이의 첫번째 원소 꺼내기 어레이의 마지막 부분에 넣기 
// array_shift, array_unshift	using array as a stack/queue 
// in_array, array_search, array_reverse, 
// sort, rsort, shuffle	searching and reordering
// array_fill, array_merge, array_intersect, 
// array_diff, array_slice, range	creating, filling, filtering
// array_sum, array_product, array_unique, 
// array_filter, array_reduce	processing elements


?>