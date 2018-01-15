<?

    print_r($_FILES["uploaded"]);

    if (isset($_FILES["uploaded"])) {

        $filename = $_FILES["uploaded"]["tmp_name"];
        $target_dir = "C:/Users/HSJPRIME/Desktop/move_here/".$_FILES['uploaded']['name'];
        $to_desktop = "C:/Users/HSJPRIME/Desktop/".$_FILES['uploaded']['name'];
        
        if (move_uploaded_file($filename,$to_desktop)) {
            print("파일 이동 완료");
        }

        else {
            print("파일 이동 실패");
        };
        
    };

?>