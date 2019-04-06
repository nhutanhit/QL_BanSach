<?php 
    require_once('config/db.class.php');
class OrderProduct
{
    public $orderID;
    public $orderDate;
    public $shipDate;
    public $shipName;
    public $shipAddress;
    public $status;
    public $userID;

    public function __construct( $orderDate, $shipDate, $shipName, $shipAddress, $status, $userID){
        $this->orderDate = $orderDate;
        $this->shipDate = $shipDate;
        $this->shipName = $shipName;
        $this->shipAddress = $shipAddress;
        $this->status = $status;
        $this->userID = $userID;
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO orderproduct (OrderDate, ShipDate, ShipName, ShipAddress, Status, UserID) VALUES ('$this->orderDate','$this->shipDate','$this->shipName','$this->shipAddress','$this->status','$this->userID')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id){
        $db = new Db();
        $sql = "UPDATE orderproduct SET OrderDate = '$this->orderDate' , ShipDate = '$this->shipDate', ShipName = '$this->shipName', ShipAddress = '$this->shipAddress', Status = '$this->status', UserID = '$this->userID' WHERE OrderID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    public function delete($id){
        $db = new Db();
        $sql = "DELETE FROM orderproduct WHERE OrderID = ".$id;
        // $result = $db->query_execute($sql);
        $query = mysqli_query($db->connect(), $sql);
        return $query;
    }

    public function list_orderproduct(){
        $db = new Db();
        $sql = "SELECT * FROM orderproduct";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public function get_orderproducr($id){
        $db = new Db();
        $sql = "SELECT * FROM orderproduct where OrderID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>