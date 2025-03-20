<?php
include 'Database.php';

class Products
{
    private $conn;
    private $table;
    private $primary_key;

    public $product_id;
    public $product_name;
    public $product_qty;
    public $product_price;


    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
        $this->table="tbl_products";
        $this->primary_key = "product_id";
    }
    public function insert()
    {
        $query = "insert into ".$this->table." SET product_name = :n,product_qty = :q,product_price = :p";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n",$this->product_name);
        $stmt->bindParam(":q",$this->product_qty);
        $stmt->bindParam(":p",$this->product_price);
        $result = $stmt->execute();
        return $result;
    }
    public function read_products()
    {
        $query = "select * from ".$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function delete_product()
    {
        $query = "delete from ".$this->table." where ".$this->primary_key."=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$this->product_id);
        $result = $stmt->execute();
        return $result;
    }
    public function get_single_product()
    {
        $query = "select * from ".$this->table." where ".$this->primary_key."=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$this->product_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function update_product()
    {
        $query = "update ".$this->table." SET product_name = :n,product_qty = :q,product_price = :p where ".$this->primary_key."=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n",$this->product_name);
        $stmt->bindParam(":q",$this->product_qty);
        $stmt->bindParam(":p",$this->product_price);;
        $stmt->bindParam(":id",$this->product_id);
        $result = $stmt->execute();
        return $result;
    }
}
