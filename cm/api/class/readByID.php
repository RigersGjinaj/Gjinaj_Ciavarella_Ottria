<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
header("Content-Type: application/json; charset=UTF-8");

include_once './db/db.php';
include_once './object/class.php';

$database = new Db();
$db = $database->getConnection();
//session_start();

$class = new Classe($db);

$stmt = $class->readByID($class_id);
$num = $stmt->rowCount();

if ($num > 0) {
    // department array
    $department_arr = array();
    $department_arr["records"] = array();

    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);
        $department_item = array(
            "id" => $row['id'],
            "year" => $row['year'],
            "section" => $row['section'],
            "spec" => $row['spec'],
        );
        array_push($department_arr["records"], $department_item);
    }
    echo json_encode($department_arr);
} else {
    echo json_encode(
            array("message" => "No class found.")
    );
}


?>