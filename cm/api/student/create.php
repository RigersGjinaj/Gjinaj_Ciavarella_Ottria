<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './db/db.php';
include_once './object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$data = json_decode(file_get_contents("php://input", true));

$student->id = $data->id;
$student->name = $data->name;
$student->surname = $data->surname;
$student->fiscal_code = $data->fiscal_code;
$student->birthday = $data->birthday;
$student->class_id = $data->class_id;

if ($student->create()) {
    echo '{';
    echo '"message": "Student was created."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to create a Student."';
    echo '}';
}
?>