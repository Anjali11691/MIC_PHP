<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate admin object
include_once '../objects/admin.php';
 
$database = new Database();
$db = $database->getConnection();
 
$admin = new admin($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set admin property values
$admin->id = $data->name;
$admin->price = $data->price;
$admin->title = $data->title;
 
// create the admin
if($admin->create()){
    echo '{';
        echo '"message": "admin was created."';
    echo '}';
}
 
// if unable to create the admin, tell the user
else{
    echo '{';
        echo '"message": "Unable to create admin."';
    echo '}';
}
?>