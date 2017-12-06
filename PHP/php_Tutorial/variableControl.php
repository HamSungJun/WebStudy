<!DOCTYPE html>
<html lang="ko">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
    </head>
    <body>
        <?
            $NAME = "함성준";
            $ID = "941119"."-"."1823312";
            $PHONE = "010"."-"."3455"."-"."1209";
            $ADDR = "안산시상록구사동";
        ?>
        <p></p>
        <p></p>
        <p></p>
        <p></p>

        <table border="2">
            <tr>
                <th>이름</th><th>주민번호</th><th>휴대폰 번호</th><th>주소</th>
            </tr>
            <tr>
                <td><?=$NAME?></td><td><?=$ID?></td><td><?=$PHONE?></td><td><?=$ADDR?></td>
            </tr>
        </table>

        <?
            $child_fee=5000;
            $adult_fee=8000;
            $num_child=3;
            $num_adult=2;

            $total_fee = ($adult_fee * $num_adult) + ($child_fee * $num_child); 
        ?>
        <p>전체 입장료 : <?= $total_fee ?> </p>

        <?
            $money = 3000; // 지불한 돈
            $price = 800; // 물건 가격
            $num = 3; // 구매하고자 하는 개수

            $change = $money - ($price * $num);

        ?>
        <p>거스름돈 : <?= $change ?></p>

        <?

            $pilgi = 71;
            $silgi = 79;
            $pass = "불합격";     

            if(($pilgi >= 70) && ($silgi >= 80)){
                $pass = "합격";
            }
            
            else{
                $pass = "불합격";
            }

        ?>
        <p>시험 결과 : <?= $pass ?></p>

        <?
            $A = 3;
            $B = 4;
            $C = 5;

            $High = 0;
            $Mid = 0;
            $Low = 0;

            if($A>$C){
                if($A>$B){
                    $High = $A;
                    if($B>$C){
                        $Mid = $B;
                        $Low = $C;
                    }
                    else{
                        $Mid = $C;
                        $Low = $B;
                    }
                }
            }
            if($B>$A){
                if($B>$C){
                    $High = $B;
                    if($A>$C){
                        $Mid = $A;
                        $Low = $C;
                    }
                    else{
                        $Mid = $C;
                        $Low = $A;
                    }
                }
            }
            if($C>$A){
                if($C>$B){
                    $High = $C;
                    if($A>$B){
                        $Mid = $A;
                        $Low = $B;
                    }
                    else{
                        $Mid = $B;
                        $Low = $A;
                    }
                }
            }
        ?>
        <p>하이 : <?= $High ?> ; 미드 : <?= $Mid ?> ; 로우 : <?= $Low ?> </p>

        <?

            $func = 2;

            switch ($func) {
                
                case '1':
                    printf("나는 1이다");
                    break;
                
                case '2':
                    printf("나는 2이다");
                    break;
                default:
                    printf("나는 default이다");
                    break;
            }

            for ($i = 1; $i <= 9; $i++) { 
                    printf("<br>");
                for ($j=1; $j <=9 ; $j++) { 
                    printf("$i * $j = ".$i*$j."<br>");
                }
            }

            $birds = array("제비","까치","가마우지","독수리");
            foreach ($birds as $bird) {?>
                <p><?=$bird?></p>
            <?}?>
            <?
                $String_Array = array("a","b","c","d","e","f","g","h","i","j",1,"1");
                shuffle($String_Array);

                $Array_to_String = implode($String_Array , ",");
                printf($Array_to_String);

                $String_to_Array = explode(",",$Array_to_String);
                print_r($String_to_Array); $Array_to_String = implode($String_Array , ",");
                printf($Array_to_String);

                $String_to_Array = explode(",",$Array_to_String);
                print_r($String_to_Array);

                function str_Separator($str , $sep = "::")
                {
                    if(strlen($str) > 0){
                        printf($str[0]);
                        for ($i=1; $i<strlen($str)  ; $i++) { 
                            printf($sep.$str[$i]);
                        }
                        
                    }
                }

                str_Separator("hamsungjun" , "+");

                $null_var = NULL;
                $var = 1;

                if(isset($null_var)){

                }
                else{
                    print "널값이네요";
                }

                $content = file("simplefile.txt");
                print_r($content);
                $content_to_Stirng = implode($content , " ");
                printf($content_to_Stirng);
            ?>

            <table border="2">
                <tr><th>1단</th><th>2단</th><th>3단</th><th>4단</th></tr>
                <?
                    for ($i=1 ; $i <=9 ; $i++) {
                        printf("<tr>");
                        for ($j=1; $j <=9 ; $j++) {
                            $k = $i * $j;
                            printf("<td>{$i}X{$j} = $k</td>");
                        }
                        printf("</tr>");
                    }   
                ?>
            </table>

            <?
                for($i = 1 ; $i <= 10 ; $i++){
                   
                    for($j = 1 ; $j+$i <= 10 ; $j++){
                        printf("C");
                    }
                    for($k = 1 ; $k <= $i ; $k++){
                        printf("A");
                    }
                    printf("<br>");
                }
            ?>

            <?
                $basu_3 = 0;
                for ($i=1 ; $i <= 1000 ; $i++) { 
                    
                    if (($i%3) == 0) {
                        $basu_3 += $i;  
                    }
                }
                printf("1~1000 3배수의 합 : $basu_3 <br>");
                
            ?>

            <?
                // 자연수 1~800 중 5의 배수가 아닌 수의 합을 누적결과로 출력
                $not_5_Sum = 0;
                for ($i=1; $i <= 800; $i++) { 
                    if($i%5 != 0){
                        $not_5_Sum += $i;
                        printf($i."까지의 합 : "."$not_5_Sum");
                        printf("<br>");
                    }
                    
                }

            ?>
            <table border="2" >
                <tr><th>야드</th><th>미터</th></tr>
            <?
                for($Yard = 10 ; $Yard <= 300 ; $Yard+=10){
                    $Meter = $Yard * 0.9144;?>
                    <tr align="center"><td><?= $Yard ?></td><td><?= $Meter ?></td></tr>
                  
                <?
                }
            ?>

            </table>

            <?
            $Counter_9 = 0;
                for ($i= 100; $i <=1000 ; $i++) { 
                    if($i % 9 == 0){
                        $Counter_9++;
                    }
                }
                printf("9배수의 개수 : $Counter_9");

                for ($i=1; $i <=1000 ; $i++) { 
                    if(($i % 2 !=0) && ($i % 3 !=0)){
                        printf($i."/");
                    }
                }
            ?>

            <?
                date_default_timezone_set("Asia/Seoul");
                $date = date("h:i:s");
                printf("$date");
            ?>

            <?
                function Normal_fee($day , $age)
                {
                    if($day = "주간"){
                        if($age <= 12 || $age >=65){
                            return 19000;
                        }
                        else{
                            return 26000;
                        }
                    }
                    if($day = "야간"){
                        if($age <= 12 || $age >= 65){
                            return 16000;
                        }
                        else{
                            return 21000;
                        }
                    }
                }

                function Free_fee($day , $age)
                {
                    if($day = "주간"){
                        if($age <= 12 || $age >=65){
                            return 24000;
                        }
                        else{
                            return 33000;
                        }
                    }
                    if($day = "야간"){
                        if($age <= 12 || $age >= 65){
                            return 21000;
                        }
                        else{
                            return 28000;
                        }
                    }
                }

                function day_2_fee($age)
                {
                    
                    if($age <= 12 || $age >=65){
                        return 40000;
                    }
                    else{
                        return 55000;
                    }
                    
                   
                }

                function combi_fee($age)
                {
                   
                        if($age <= 12 || $age >=65){
                            return 40000;
                        }
                        else{
                            return 54000;
                        }
                  
                   
                }

                printf(Normal_fee("주간" , 44));
                printf(Free_fee("야간" , 9));
                printf(day_2_fee(70));
                printf(combi_fee(40));

            ?>
    </body>
</html>

        