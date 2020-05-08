
<?php
/*session_start();
$wname = $_POST['wname'];
if(substr($wname, 0, 4) == "www.") $wname = preg_replace('/www./', '', $wname, 1);
$result = dns_get_record("$wname.");
print_r($result);
$result1 = $result[0]["host"];
//$print_r($result1);
if($result1===$wname)$_SESSION['haho'] = "Домейнът $wname е зает";
else($_SESSION['haho'] = "Домейнът $wname е свободен");
if($wname=='')($_SESSION['haho'] = "Въведете име на уебсайт");
header('Location:index.php?#domaincheck');*/
$haho = "";
$wname = $_POST['wname'];
if(substr($wname, 0, 4) == "www.") $wname = preg_replace('/www./', '', $wname, 1);
$result = dns_get_record("$wname.");
//print_r($result);
$result1 = $result[0]["host"];
//$print_r($result1);
if($result1===$wname)$haho = "Домейнът $wname е зает";
else($haho = "Домейнът $wname е свободен");
if($wname=='')($haho = "Въведете име на уебсайт");

echo json_encode(['code'=>200, 'haho'=>$haho]);
	exit;

?>