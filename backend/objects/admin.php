<?php
class Admin{
 
    // database connection and table name
    private $conn;
    private $table_name = "admins";
 
    // object properties
    public $id;
    public $title;
    public $price;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read admins
    public function read(){
    
        // select all query
        $query = "SELECT
                    id,title,price
                FROM
                    " . $this->table_name;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }
    // create admin
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                title=:title, price=:price";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->price=htmlspecialchars(strip_tags($this->price));
 
    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":price", $this->price);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}