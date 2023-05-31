<?php
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