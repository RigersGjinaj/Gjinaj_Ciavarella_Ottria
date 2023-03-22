<?php 

class Classe{
    private $conn;
    private $table_name="class";
    public $id;

    public $year;
    public $section;
    public $spec;

    public function __construct($db){
        $this->$conn = $db;
    }

    function read()
    {
        // query to select all
        $query = "SELECT id, year, section, spec
            FROM
                " . $this->table_name . "
            ORDER BY id";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
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
                year=:year, section=:section, spec=:spec";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->section = htmlspecialchars(strip_tags($this->section));
        $this->spec = htmlspecialchars(strip_tags($this->spec));
        // bind values
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":section", $this->section);
        $stmt->bindParam(":spec", $this->spec);

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
                dept_name = :name
            WHERE
                dept_id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


}







?>