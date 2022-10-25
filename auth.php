<?php
include_once 'database.php';
include_once 'functions.php';
include_once 'config.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get posted data
    $data = $_POST;
    define("EMAIL",$data['email']);
    define("PASSWORD",$data['parental_password']);
    if(EMAIL && PASSWORD){
    $sql = "SELECT email FROM users u WHERE email = '" . db::escape_String(EMAIL) . "' AND parental_password = '" . md5(db::escape_String(PASSWORD)) . "' ";
    $result = db::getCell($sql);

if($result){
    $headers = array('alg' => 'HS256', 'typ' => 'JWT');
    $payload = array('email' => $result, 'exp' => (time() +TOKEN_EXPIRY_TIME ));
    $jwt = generate_jwt($headers, $payload);
    echo json_encode(array('response' => 200,'token' => $jwt));
}else{
    echo json_encode(array('response' => 401,'description'=>'Email or parental_password is inccorect')); 
}
   
}else{
    echo json_encode(array('response' => 402,'description'=>'You have missing Email or parental_password '));
}
}
//End of file
