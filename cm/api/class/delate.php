<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './db/db.php';
include_once './object/class.php';

$database = new Db();
$db = $database->getConnection();


$class = new Classe($db);

$class->id = filter_input(INPUT_GET, 'id');

if ($class->delete($class_id)) {
    echo '{';
    echo '"message": "Class was deleted."';
    echo '}';
}

// if unable to create the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to delete Class."';
    echo '}';
}

?>