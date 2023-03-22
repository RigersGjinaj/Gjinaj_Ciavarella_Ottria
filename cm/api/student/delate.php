<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../db/db.php';
include_once '../../object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$student->id = filter_input(INPUT_GET, 'id');

if ($student->create()) {
    echo '{';
    echo '"message": "Student was deleted."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to deleted a Student."';
    echo '}';
}

?>