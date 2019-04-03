<?php 
    require_once('config/db.class.php');
class Category
{
    public $CateID;
    public $CategoryName;
    public $Description;

    public function __construct($cat_name, $des){
        $this->CategoryName = $cat_name;
        $this->Description = $des;
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO category (CategoryName, Description) VALUES ('$this->CategoryName','$this->Description')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id){
        $db = new Db();
        $sql = "UPDATE category SET CategoryName = '$this->CategoryName' , Description = '$this->Description'WHERE CateID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    public function delete($id){
        $db = new Db();
        $sql = "DELETE FROM category WHERE CateID = ".$id;
        // $result = $db->query_execute($sql);
        $query = mysqli_query($db->connect(), $sql);
        return $query;
    }

    public function list_category(){
        $db = new Db();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public function get_category($id){
        $db = new Db();
        $sql = "SELECT * FROM category where CateID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>