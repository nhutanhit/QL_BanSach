<?php 
    require_once('config/db.class.php');
class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture){
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES ('$this->productName','$this->cateID','$this->price','$this->quantity','$this->description','$this->picture')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id){
        $db = new Db();
        $sql = "UPDATE product SET ProductName = '$this->productName' , CateID = '$this->cateID', Price = '$this->price', Quantity = '$this->quantity', Description = '$this->description', Picture = '$this->picture' WHERE ProductID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    public function delete($id){
        $db = new Db();
        $sql = "DELETE FROM product WHERE ProductID = ".$id;
        // $result = $db->query_execute($sql);
        $query = mysqli_query($db->connect(), $sql);
        return $query;
    }

    public function list_product(){
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public function get_product($id){
        $db = new Db();
        $sql = "SELECT * FROM product where ProductID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

      public function get_product_by_CateID($id){
        $db = new Db();
        $sql = "SELECT * FROM product where CateID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>