<?php 
class Student{

    private $conn;
    private $table_name="student";
    public $id;
    public $name;
    public $surname;
    public $fiscal_code;
    public $birthday;
    public $class_id;

    public function __construct($db){
        $this->$conn = $db;
    }

    function read()
    {
        // query to select all
        $query = "SELECT id, name, surname, fiscal_code, birthday, class_id
            FROM
                " . $this->table_name . "
            ORDER BY id";
        // prepare query statement
        $stmt = $this->$conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name =: name, surname =: surname, fiscal_code =: fiscal_code, birthday =: birthday, class_id =: class_id";
        // prepare query
        $stmt = $this->$conn->prepare($query);
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->fiscal_code = htmlspecialchars(strip_tags($this->fiscal_code));
        $this->birthday = htmlspecialchars(strip_tags($this->birthday));
        $this->class_id = htmlspecialchars(strip_tags($this->class_id));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":fiscal_code", $this->fiscal_code);
        $stmt->bindParam(":birthday", $this->birthday);
        $stmt->bindParam(":class_id", $this->class_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function update()
    {
        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
            name =: name, surname =: surname, fiscal_code =: fiscal_code, birthday =: birthday, class_id =: class_id
            WHERE
                id =: id";

        // prepare query statement
        $stmt = $this->$conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->fiscal_code = htmlspecialchars(strip_tags($this->fiscal_code));
        $this->birthday = htmlspecialchars(strip_tags($this->birthday));
        $this->class_id = htmlspecialchars(strip_tags($this->class_id));
        
        // bind new values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":fiscal_code", $this->fiscal_code);
        $stmt->bindParam(":birthday", $this->birthday);
        $stmt->bindParam(":class_id", $this->class_id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->$conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
?>