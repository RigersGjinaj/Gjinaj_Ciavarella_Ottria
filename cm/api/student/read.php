<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './db/db.php';
include_once './object/student.php';


$database = new Db();
$db = $database->getConnection();

$student = new Student($db);

$stmt = $student->read();
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
            "name" => $row['name'],
            "surname" => $row['surname'],
            "fiscal_code" => $row['fiscal_code'],
            "birthday" => $row['birthday'],
            "class_id" => $row['class_id']
        );
        array_push($department_arr["records"], $department_item);
    }
    echo json_encode($department_arr);
} else {
    echo json_encode(
            array("message" => "No student found.")
    );
}

?>