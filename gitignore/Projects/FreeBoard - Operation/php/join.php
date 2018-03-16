<?

$ID = $_POST["ID"];
$PASSWORD = $_POST["PASSWORD"];
$TEL = $_POST["TEL"];
$NICKNAME = $_POST["NICKNAME"];
$FILE_EXT = $_FILES["upload"]["type"];
$FILE_SIZE = $_FILES["upload"]["size"];
$RG = false;
$target_dir = "";
//print("나로 넘어왔군여 정보는 다음과 같아.");
//print_r($_POST);
//print("<br>");
//print_r($_FILES["upload"]);
//print("<br>");
function validate( $ID ,  $PASSWORD ,  $TEL ,  $NICKNAME ,  $FILE_EXT ,  $FILE_SIZE)
{
    //pr("함수실행됨");
    $IMAGE_EXT = ['image/png' , 'image/PNG' , 'image/bmp' , 'image/BMP' , 'image/jpg' , 'image/JPG' , 'image/JPEG' , 'image/jpeg'];
    global $RG , $target_dir;
    

    if($ID && $PASSWORD && $TEL && $NICKNAME && $FILE_SIZE > 0 && $FILE_EXT){
        //pr(" 값은 다 들어옴! <br/>");
        
        if(preg_match('/^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z]{2,4}$/',$ID) || preg_match('/^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z]{2,4}+.[A-Za-z]{2,4}$/',$ID)){
            //print("아이디 통과 중복확인 진행 <br/>");
            
            $dbconn = mysqli_connect("localhost","wleo12345","tjdwns12","wleo12345");

            $CHECK_SQL = "SELECT ID FROM user WHERE ID = '$ID'";
            $RESULT = mysqli_query($dbconn , $CHECK_SQL);
            
            if(!$RESULT){
                //echo "중복아이디 없음. 진행 <br/>";
                if (preg_match('/[a-zA-Z0-9]{8,12}/',$PASSWORD)){
                    //print("비밀번호 통과 <br/>");
                    
                    if (preg_match('/[0-9]{3}-[0-9]{4}-[0-9]{3}/',$TEL)){
                        //print("전화번호 통과 <br/>");
                    
                        if (preg_match('/[0-9A-Za-z\s\xA1-\xFE]{1,8}/',$NICKNAME)){
                                        //print("닉네임 통과 <br/>");
                    
                            if(in_array($FILE_EXT,$IMAGE_EXT) && $FILE_SIZE <= 2000000){
                                //print("이미지 확장자 통과 유저정보를 데이터베이스에 입력시작 <br/>");
                                $INSERT_SQL = "INSERT INTO User VALUES('$ID' , '$PASSWORD' , '$NICKNAME' , '$TEL')";
                                mysqli_query($dbconn,$INSERT_SQL);
                                print(mysqli_error($dbconn));
                                //print("유저정보 입력완료");
                                $FILENAME = $_FILES["upload"]["tmp_name"];
                                $target_dir = "../User_Image/".$ID.$_FILES['upload']['name'];
                                
                                if(move_uploaded_file($FILENAME,$target_dir)){
                                   
                                    $INSERT_PROFILE_SQL = "INSERT INTO User_Image VALUES('$ID','$target_dir')";
                                    mysqli_query($dbconn,$INSERT_PROFILE_SQL);
                                    print(mysqli_error($dbconn));
                                    mysqli_close($dbconn);
                                    $RG=true;
                                    return "회원가입 성공";
                                }
                            }
                            else{
                                return "해당 파일은 이미지 파일이 아닙니다. 혹은 2MB 이상의 파일입니다.";
                            }
                                        
                        }
                        else{
                            return "닉네임이 띄어쓰기를 포함한 1~8 글자의 한글 , 영대소문자 , 숫자가 아닙니다.";
                        }
                    }
                    else{
                        return "전화번호가 000-0000-000의형태가 아닙니다.";
                    }
                }
                else{
                    return "비밀번호가 8~12개의 영대소문자 및 숫자조합이 아닙니다.";
                }
            }
            else{
                return "중복된 아이디가 존재합니다. 다른아이디로 설정해주세요.";
            };
         
        }
        else{
            return "아이디가 이메일주소 형태가 아닙니다.";
        }
    }
    else{
        return "가입 항목요소는 필히 다 채우셔야 합니다.";
    }
   
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>회원가입 결과</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="../libraries/bootstrap.css">
        <link rel="shortcut icon" href="../Materials/images/favicon.PNG" type="image/png">
        <script src="../libraries/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="../libraries/bootstrap.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script>
            $(document).ready(function(){ 
                $("#go_index").on("click",function () {
                    window.location.href = "../index.html";
                })
             })
        </script>
        <style>
            *{
                /* border : 1px solid black; */
                box-sizing: border-box;
            }

            body,.bg-lavender {
                background-color: lavender;
                background-image: url("https://wallpaperscraft.com/image/question_marks_3d_shape_112826_1920x1080.jpg");
            }

            #icon {
                width: 50px;
                height: 50px;
            }
            #profile_img{
                width : 200px;
                height : 200px;
                border-radius : 50%;
            }
        </style>

    </head>

    <body>
        <div class="container bg-lavender p-5">
            <div class="container bg-white rounded py-3">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="m-0 py-3">회원가입 결과</h1>
                        <hr class="m-0">
                        <p class="m-0 py-3">
                            <?= validate($ID , $PASSWORD , $TEL ,$NICKNAME ,$FILE_EXT , $FILE_SIZE) ?>
                        </p>
                    </div>
                </div>
                <?
                if ($RG == true) {?>
                   
                <div class="row align-items-center py-3">
                    <div class="col-md-6 text-center">
                        <p>회원 아이디 : <?= $ID ?></p>
                        <hr>
                        <p>회원 비밀번호 : <?= $PASSWORD ?> </p>
                        <hr>
                        <p>회원 닉네임 : <?= $NICKNAME ?> </p>
                        <hr>
                        <p>회원 연락처 : <?= $TEL ?> </p>
                    </div>
                    <div class="col-md-6 text-center">
                        <p>프로필 이미지</p>
                        <img id="profile_img" class="img-thumbnail" src="../User_Image/<?=$ID.$_FILES['upload']['name']?>" alt="profile_img">
                    </div>
                </div>
            <hr class="m-0">
                <div class="row align-items-center py-3">
                    <div class="offset-md-9 col-md-3 text-center">
                        <button id="go_index" type="button" class="btn btn-outline-dark">로그인 하기</button>
                    </div>
                </div>

            <?
            }
            ?>
               
            </div>
        </div>
    </body>

    </html>