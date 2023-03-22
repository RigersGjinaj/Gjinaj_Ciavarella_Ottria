<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../db/db.php';
include_once '../../object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$data = json_decode(file_get_contents("php://input", true));

$student->id = $data->id;
$student->name = $data->name;
$student->surname = $data->surname;
$student->fiscal_code = $data->fiscal_code;
$student->birthday = $data->birthday;
$student->id_class = $data->id_class;

if ($student->update()) {
    echo '{';
    echo '"message": "Student was updated."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to update a Student."';
    echo '}';
}


?>