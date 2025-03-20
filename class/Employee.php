
<?php
include 'Database.php';
class Employee
{
    private $conn;
    private $table;
    private $primary_key;

    public $employe_id ;
    public $employe_name;
    public $employe_gender;
    public $employ_salery;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
        $this->table="employ";
        $this->primary_key = "employe_id";
    }
  

    public function insert_employe()
    {
        $query = "insert into ".$this->table." SET employe_name = :n,employe_gender = :g,employ_salery = :s";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->employe_name);
        $stmt->bindParam(":g", $this->employe_gender);
        $stmt->bindParam(":s", $this->employ_salery);
        $result = $stmt->execute();
        return $result;
    }
    public function read_employe()
    {
        $query = "select * from ".$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function delete_employe()
    {
        $query = "delete from ".$this->table." where ".$this->primary_key."=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->employe_id);
        $result = $stmt->execute();
        return $result;
    }
    public function get_single_employe()
    {

        $query = "select * from ".$this->table." where".$this->primary_key."=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->employe_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function update_employe($name, $gender, $salery, )
    {
        $query = "update ".$this->table." SET employe_name = :n,employe_gender = :g,employ_salery = :s  where ".$this->primary_key."=:id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":n", $this->employe_name);
        $stmt->bindParam(":g",$this->employe_gender);
        $stmt->bindParam(":s", $this->employ_salery);
        $stmt->bindParam(":id", $this->employe_id);
        $result = $stmt->execute();
        return $result;
    }
}
