<!DOCTYPE html>
<html lang="KO">
<head>
    <title>주차장 관리 시스템</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./libraries/bootstrap.css">
    <!-- <link rel="stylesheet" href="./styles/index.css"> -->
    <script src="./libraries/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="./libraries/bootstrap.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    
    <!-- <script src="./scripts/index.js"></script> -->
    <script>
        var parked;

        $(document).ready(function () {
            data_check();

            $("#park_btn").on("click", function () {
                $("#insert").modal("show");
            });
            $("#unpark_btn").on("click", function () {
                $("#delete").modal("show");
            });
            $("#p_info").on("click", function () {
                P_LOT_info();
            });
            $("#park").on("click", function () {
               data_insert();
               $("#insert").modal("hide");
            });
            $("#unpark").on("click", function () {
               data_delete();
               $("#delete").modal("hide");
            });

            
        })

        function data_check() {

            $.ajax({
                type: "POST",
                url: "./PHP/status.php",
                data: {
                    "P_LOT_NAME" : "A1"
                },
                dataType: "json",
                success: function (response) {
                    // 주자중인 space id 넘버 확인후 해당 space를 붉게 변경
                    parked = response.NUMBERS;

                    for (var index = 1; index < 25; index++) {

                        $("#"+index).css({
                            "backgroundColor" : "lightgreen"
                        })
                        
                    }

                    for (var index = 0; index < response.NUMBERS.length; index++) {
                        
                        $("#"+response.NUMBERS[index]).css({
                            "backgroundColor" : "tomato"
                        })
                        
                    }
                    
                    // alert(parked);
                }
            });

        }

        function data_insert(){
            
            $.ajax({
                type: "POST",
                url: "./PHP/insert.php",
                data: {
                    "CAR_OWNER" : $("#name").val(),
                    "CAR_NUMBER" : $("#car").val(),
                    "PHONE_CALL" : $("#phone").val(),
                    "P_LOT_SPACE_ID" : parseInt($("#space_id").val())
                },
                success: function () {
                    data_check();
                }
            });
        }
        function data_delete(){
            $.ajax({
                type: "POST",
                url: "./PHP/delete.php",
                data: {
                    "CAR_NUMBER" : $("#unpark_car").val()
                },
                success: function () {
                    data_check();
                }
            });
        }
        function P_LOT_info(){
            $.ajax({
                type: "POST",
                url: "./PHP/info.php",
                data: {
                    "P_LOT_NAME" : "A1"
                },
                dataType: "json",
                success: function (response) {
                    // 모달 출력데이터 설정
                    
                    $("#P_LOT_NAME").prop("value" , "주차장 이름 : " + response.P_LOT_NAME[0]);
                    $("#IS_FREE").prop("value" , "주차장 비용 : " + response.IS_FREE[0]);
                    $("#IS_INOUTSIDE").prop("value" , "주차장 특성 : " + response.IS_INOUTSIDE[0]);
                    $("#TOTALSPACE").prop("value" , "주차장 잔여 주차자리 : " + response.TOTAL_SPACE[0]);
                    $("#USINGSPACE").prop("value" , "주차된 주차자리 수 : " + response.USING_SPACE[0]);
                    $("#LEFTSPACE").prop("value" , "남은 주차자리 수 : " + response.LEFT_SPACE[0]);
                    $("#select").modal("show");
                }
            });
            

        }
        
        function data_status(){

        }

    </script>
    <style>
        .bg-ivory{
            background-color: ivory;
        }
        tr,td{
            border : 3px solid black;
        }
    </style>

</head>
<body class="bg-ivory">

<div class="modal fade" id="insert" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: ivory; opacity: 0.9;">
                <div class="modal-header justify-content-center bg-white">
                    <h3 class="modal-title font-weight-bold">주차하기</h3>

                    <!-- <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button> -->
                </div>
                <div class="modal-body">
               
                  <div class="container-fluid">
                      <div class="row align-items-center">
                          <div class="col-xl-12 p-xl-3 col-md-12 p-xl-6">
                           
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="far fa-id-card fa-2x"></i></span>
                                    <input id= "name" type="text" class="form-control text-center" placeholder="성명">
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id= "car" type="text" class="form-control text-center" placeholder="차량번호">
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-child fa-2x" style="width : 32px;"></i></span>
                                    <input id= "phone" type="text" class="form-control text-center" placeholder="연락처">
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-child fa-2x" style="width : 32px;"></i></span>
                                    <input id="space_id" type="text" class="form-control text-center" placeholder="주차하고자 하는 자리">
                                </div>
                          </div> 
                      </div>
                  </div>
                </div>
                <div class="modal-footer bg-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8 col-md-8">
                                <!-- <div class="alert alert-warning m-0" role="alert">
                                    This is a warning alert—check it out!
                                </div> -->
                            </div>
                            <div class="col-xl-4 col-md-4 text-right">
                                <button id="park" type="submit" class="btn btn-outline-success text-justify h-100">주차하기</button>
                                <button type="button" class="btn btn-outline-danger h-100" data-dismiss="modal">취소</button>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: ivory; opacity: 0.9;">
                <div class="modal-header justify-content-center bg-white">
                    <h3 class="modal-title font-weight-bold">차빼기</h3>

                    <!-- <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button> -->
                </div>
                <div class="modal-body">
               
                  <div class="container-fluid">
                      <div class="row align-items-center">
                          <div class="col-xl-12 p-xl-3 col-md-12 p-xl-6">
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="unpark_car" type="text" class="form-control text-center" placeholder="차량번호">
                                </div>
                          </div> 
                      </div>
                  </div>
                </div>
                <div class="modal-footer bg-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8 col-md-8">
                                <!-- <div class="alert alert-warning m-0" role="alert">
                                    This is a warning alert—check it out!
                                </div> -->
                            </div>
                            <div class="col-xl-4 col-md-4 text-right">
                                <button id="unpark" type="submit" class="btn btn-outline-success text-justify h-100">차빼기</button>
                                <button type="button" class="btn btn-outline-danger h-100" data-dismiss="modal">취소</button>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="select" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: ivory; opacity: 0.9;">
                <div class="modal-header justify-content-center bg-white">
                    <h3 class="modal-title font-weight-bold">주차장 정보</h3>

                    <!-- <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button> -->
                </div>
                <div class="modal-body">
               
                  <div class="container-fluid">
                      <div class="row align-items-center">
                          <div class="col-xl-12 p-xl-3 col-md-12 p-xl-6">
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="P_LOT_NAME" type="text" class="form-control text-center" placeholder="주차장 이름" readonly>
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="IS_FREE" type="text" class="form-control text-center" placeholder="유료 혹은 무료" readonly>
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="IS_INOUTSIDE" type="text" class="form-control text-center" placeholder="실내 혹은 야외 주차장" readonly>
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="TOTALSPACE" type="text" class="form-control text-center" placeholder="잔여주차 자리수" readonly>
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="USINGSPACE" type="text" class="form-control text-center" placeholder="주차된 자리 수" readonly>
                                </div>
                                <div class="input-group mt-xl-3 mt-md-3">
                                    <span class="input-group-addon"><i class="fas fa-key fa-2x"></i></span>
                                    <input id="LEFTSPACE" type="text" class="form-control text-center" placeholder="남은 주차 자리 수" readonly> 
                                </div>
                          </div> 
                      </div>
                  </div>
                </div>
                <div class="modal-footer bg-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8 col-md-8">
                                <!-- <div class="alert alert-warning m-0" role="alert">
                                    This is a warning alert—check it out!
                                </div> -->
                            </div>
                            <div class="col-xl-4 col-md-4 text-right">
                                <button type="button" class="btn btn-outline-danger h-100" data-dismiss="modal">확인</button>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center bg-dark p-3">
            <div class="col-md-8 text-white text-center">
                <h1>Parking Lot System</h1>
            </div>
            <div class="col-md-4 text-white text-center">
                <h1>NAME : A1</h1>
            </div>
        </div>
        <div class="row align-items-center bg-ivory h-50">
                <div class="col-md-12 p-0 text-center">
                    <div class="table-responsive m-0 p-3">
                        <table class="table collapsed text-center">
                            <?php
                            for ($i = 1; $i <= 24; $i++) {
                            if ($i % 6 == 1) {?>
                                <tr>
                            <?}?>
                                <td class="p-3" id= <?= "$i" ?>><?= $i ?></td>
                            <?
                            if ($i % 6 == 0) {?>
                                </tr>
                            <?}
                            ?>
                            <?}
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        <div class="row m-3 p-3">
            <div class="col-md-4">
                <button id="park_btn" class="btn btn-block btn-outline-dark">주차하기</button>
            </div>
            <div class="col-md-4">
                <button id="unpark_btn" class="btn btn-block btn-outline-dark">차빼기</button>
            </div>
            <div class="col-md-4">
                <button id="p_info" class="btn btn-block btn-outline-dark">주차장 정보</button>
            </div>
           
        </div>
    </div>
</body>
</html>