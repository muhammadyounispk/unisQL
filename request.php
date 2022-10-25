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
	$data = file_get_contents('php://input');
	$arr_query=json_decode($data,true);
	prt($arr_query);
	
	 $query=$arr_query['query'];

	
	$q="SELECT ".$arr_query['get']. " FROM ".$params[2];
	echo $q;
}else{
	echo "INVALID ACCESS";
}
?>