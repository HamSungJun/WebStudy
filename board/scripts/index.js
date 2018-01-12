
        var Duplication_Check = false;

        $(document).ready(function () {
            
            $("#email_input").on("change",function (){
                Duplication_Check = false;
            })

            $("#ModalTrigger").on("click", function () {
                $("#Mymodal").modal("show");
            });

            $("#file_input").on("change",function () {
                var tmppath = URL.createObjectURL(event.target.files[0]);

                $("#profile_img").attr("src",tmppath);
                $("#profile_img").hide();
                $("#profile_img").fadeIn("slow");
                
            });

            $("#Duplication_Check").on("click",function (){
                var email = $("#email_input").val();
                
                var email_pattern = new RegExp('^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z]{2,4}$');
                var email_res = email_pattern.test(email);

                if(!email_res){
                alert("잘못된 이메일 계정 형식입니다.");
                }
                else{
                
                  $.ajax({
                      type: "POST",
                      url: "../php/Duplication_Checker.php",
                      data: { Email : email},
                      dataType: "json",
                      success: function (response) {
                        alert("잘 왔어요");
                        
                        if(response.TF == "false"){
                            alert("중복된 아이디 입니다.");
                        }
                        else{
                            alert("사용 가능한 아이디 입니다.");
                            Duplication_Check = true;
                        }
                    },
                      error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
                  });
                }
            })

            $("#Register_Submit").on("click",function () {
                
                //입력한 아이디의 중복을 Check하고 file_name 변수 제외 5개의 변수를 전달하여 유효성 검사.
                if(Duplication_Check === true){

                var email = $("#email_input").val();
                var password = $("#pw_input").val();
                var nickname = $("#nickname_input").val();
                var profile_Img = $("#file_input")[0].files[0];
                var file_name = $("#file_input").val().split("\\");
                var basename = file_name[file_name.length-1];
                
                RegisterData_Validator(email , password , nickname , profile_Img , basename);

            }
            else{
                alert("아이디 중복성 확인을 먼저 진행해 주세요.");
            }
            });

        })

        function RegisterData_Validator(email , password , nickname , profile_Img , basename) {
            var Email_Pass = false;
            var Password_Pass = false;
            var Nickname_Pass = false;
            var profile_Img_Pass = false;
            var basename_Pass = false;

            var email_pattern = new RegExp('^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z]{2,4}$');
            var email_res = email_pattern.test(email);
            var password_pattern = new RegExp('^[A-Za-z0-9_-]{6,10}$');
            var password_res = password_pattern.test(password);
            var nickname_pattern = new RegExp('^[가-힣A-Za-z0-9_-]{4,10}$');
            var nickname_res = nickname_pattern.test(nickname);
            
            if(!email_res){
                alert("잘못된 이메일 계정입니다.");
            }
            else{
                alert("아이디 좋습니다.");
                Email_Pass = true;
            }

            if(!password_res){
                alert("잘못된 비밀번호 패턴입니다.");
            }
            else{
                alert("비밀번호 좋습니다.");
                Password_Pass = true;
            }
            if(!nickname_res){
                alert("잘못된 닉네임입니다.");   
            }
            else{
                alert("닉네임 좋습니다.");
                Nickname_Pass = true;
            }
            if(profile_Img === undefined){
                alert("프로필 파일을 설정하지 않았습니다.");
            }
            else{
                var $IMGS = ["jpg" , "jpeg" , "png" , "bmp" , "JPG" , "JPEG" , "PNG" , "BMP"];
                if($IMGS.indexOf(basename.substring(basename.length-3,basename.length)) == -1){
                    alert("이미지 파일이 아닙니다 올바른 파일을 선택해주세요.");
                     
                }
                else{
                    alert("이미지 좋습니다.");
                    alert(profile_Img);
                    profile_Img_Pass = true;
                    basename_Pass = true;
                }
                
            }

            if(Email_Pass && Password_Pass && Nickname_Pass && profile_Img_Pass && basename_Pass == true){

                var formData = new FormData("PROFILE",profile_Img);
                formData.append("Email",email);
                formData.append("Password",password);
                formData.append("Nickname",nickname);
                
                $.ajax({
                    type: "POST",
                    url: "../php/Register.php",
                    processData: false,
	                contentType: false,
                    data: formData,
                    success: function (response) {
                      alert("회원정보 전달 성공!");  
                    },
                    error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
                });

               
            }

        }

        