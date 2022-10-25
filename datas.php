<?php
include_once '../common/database.php';
include_once 'functions.php';
include_once '../common/functions.php';
include_once 'config.php';
$bearer_token = get_bearer_token();
$is_jwt_valid = is_jwt_valid($bearer_token);
if($is_jwt_valid) {
	$uri = $_SERVER['REQUEST_URI'];
	$params=explode("/",explode(".php",$uri)[1]);
	unset($params[0]);
switch($params[1]){
case 'get':
	get_Requets($params);
	break;
 default:
 echo json_encode(array("response"=>404,"description"=>"  \" " .$params[1]."() \"  not  Found"   ));

}
	
}else{
	echo "INVALID ACCESS";
}
?>