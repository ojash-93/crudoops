
<?php

class Category
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert_category($name, $description)
    {
        $query = "insert into category SET category_name = :n,category_description = :d";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $name);
        $stmt->bindParam(":d", $description);
      
        $result = $stmt->execute();
        return $result;
    }
    
    public function read_category()
    {
        $query = "select * from category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function delete_category($id)
    {
        $query = "delete from category where category_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }
    public function get_single_category($id)
    {

        $query = "select * from category where category_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function update_category($name,$description,$id)
    {
        $query = "update category SET category_name = :n,category_description = :d where category_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $name);
        $stmt->bindParam(":d", $description);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }
}
