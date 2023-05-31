<?php
include_once './db/db.php';
include_once './object/class.php';

$database = new Db();
$db = $database->getConnection();


$class = new Classe($db);

$data = json_decode(file_get_contents("php://input", true));

$class->year = $data->year;
$class->section = $data->section;
$class->spec = $data->spec;

if ($class->update($class_id)) {
    echo '{';
    echo '"message": "Class was updated."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to updated Class."';
    echo '}';
}

?>