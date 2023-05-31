<?php
include_once './db/db.php';
include_once './object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$student->id = filter_input(INPUT_GET, 'id');

if ($student->delete($student_id)) {
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