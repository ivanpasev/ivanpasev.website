

<?php
$errorname = "";
$erroremptyphone = "";
$errorinvalidphone = "";
$erroremptymail = "";
$errorinvalidmail = "";
$errormessage = "";


/* NAME */
if (empty($_POST["name"])) {
    $errorname = "<li>Въведете Вашите имена</<li>";
} else {
    $name = $_POST["name"];
}

/* PHONE */
if (empty($_POST["phone"])) {
    $erroremptyphone .= "<li>Не сте въвели телефон</li>";
} else if (!preg_match("/^\+?[0-9]+$/", $_POST["phone"])) {
    $errorinvalidphone .= "<li>Телефонният номер е само с цифри</li>";
}else {
    $phone = $_POST["phone"];
}


/* EMAIL */
if (empty($_POST["email"])) {
    $erroremptymail .= "<li>Не сте въвели имейл</li>";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorinvalidmail .= "<li>Невалиден имейл</li>";
}else {
    $email = $_POST["email"];
}


/* BUDGET */
if (($_POST["budget"])=='choose')$budget='choose';
if (($_POST["budget"])=='400')$budget='400';
if (($_POST["budget"])=='600')$budget='600';
if (($_POST["budget"])=='800')$budget='800';
if (($_POST["budget"])=='1000plus')$budget='1000plus';


/* MESSAGE */
if (empty($_POST["message1"])) {
    $errormessage .= "<li>Не сте въвели съобщение</li>";
} else {
    $message1 = $_POST["message1"];
}

if((empty($errorname))&&(empty($erroremptyphone))&&(empty($errorinvalidphone))&&(empty($erroremptymail))&&(empty($errorinvalidmail))&&(empty($errormessage))){
	$message = "Име: ".$name.", Телефон: ".$phone.", Email: ".$email.", Бюджет: ".$budget.", Съобщение:".$message1;
$to = "ivanpasev@abv.bg";
$subject = "Website Order";
//$message = "
//$name
//$phone
//$email
//$budget
//$message1
//";
$from = "office@ivanpasev.website";
$headers = "From:" . $from;

$headerFields = array(
    "From: {$from}",
    "MIME-Version: 1.0",
    "Content-Type: text/html;charset=utf-8"
);

mail($to,$subject,$message,implode("\r\n", $headerFields));


	
	$thanks = "БЛАГОДАРЯ ВИ ЧЕ ОСТАВИХТЕ СЪОБЩЕНИЕ. СЪВСЕМ СКОРО ЩЕ СЕ СВЪРЖА С ВАС!";
	echo json_encode(['code'=>200, 'thanks'=>$thanks]);
	exit;
}

//if(empty($errorMSG)){
	//$msg = "Name: ".$name.", Email: ".$email.", Subject: ".$msg_subject.", Message:".$message;
	//echo json_encode(['code'=>200, 'msg'=>$msg]);
	//exit;
//}
if((!empty($errorname))||(!empty($erroremptyphone))||(!empty($errorinvalidphone))||(!empty($erroremptymail))||(!empty($errorinvalidmail))||(!empty($errormessage)))
{
	echo json_encode(['code'=>404, 'error1'=>$errorname, 'error2'=>$erroremptyphone, 'error3'=>$errorinvalidphone, 'error4'=>$erroremptymail, 'error5'=>$errorinvalidmail, 'error6'=>$errormessage]);
	exit;
}


//echo json_encode(['code'=>404, 'error1'=>$errorname, 'error2'=>$erroremptymail, 'error3'=>$errorinvalidmail, 'error4'=>$errorsubject, 'error5'=>$errormessage]);


?>
