<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../db/db.php';
include_once '../../object/class.php';

$database = new Db();
$db = $database->getConnection();


$class = new Classe($db);

$data = json_decode(file_get_contents("php://input", true));

$class->id = $data->id;
$class->year = $data->year;
$class->section = $data->section;
$class->spec = $data->spec;

if ($class->create()) {
    echo '{';
    echo '"message": "Class was created."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to create Class."';
    echo '}';
}


?>

