<?php
include_once './db/db.php';
include_once './object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$data = json_decode(file_get_contents("php://input", true));

$student->name = $data->name;
$student->surname = $data->surname;
$student->fiscal_code = $data->fiscal_code;
$student->birthday = $data->birthday;
$student->id_class = $data->id_class;

if ($student->update($student_id)) {
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