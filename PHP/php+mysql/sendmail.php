<?

// 메세지
$message = "Line 1 \n Line 2 \n Line 3";

// 한 줄이 70 문자를 넘어갈 때를 위하여, wordwrap()을 사용해야 합니다.
$message = wordwrap($message, 70);

$headers = 'From: tjdwns5123@gmail.com' . "\r\n" .
    'Reply-To: tjdwns5123@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// 전송

if(mail('wleo12345@naver.com', 'My Subject', $message , $headers)){
    print("메일 발송됨");
}
else {
    print("메일 발송 실패");
};
?>
