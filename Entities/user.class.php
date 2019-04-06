<?php 
    require_once('config/db.class.php');
class User
{
    public $UserID;
    public $FullName;
    public $Username;
    public $Password;
    public $Address;
    public $Phone;
    public $Role;
    public $Status; 

    public function __construct($fullname, $username, $password, $address, $phone, $role, $status){
        $this->FullName = $fullname;
        $this->Username = $username;
        $this->Password = $password;
        $this->Address = $address;
        $this->Phone = $phone;
        $this->Role = $role;
        $this->Status = $status; 
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO user (FullName, Username, Password, Address, Phone, Role, Status) VALUES ('$this->FullName','$this->Username','$this->Password','$this->Address',' $this->Phone','$this->Role', '$this->Status')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id){
        $db = new Db();
        $sql = "UPDATE user SET FullName = '$this->FullName' , Username = '$this->Username', Password = '$this->Password', Address = '$this->Address', Phone = '$this->Phone', Role = '$this->Role' WHERE UserID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    public function delete($id){
        $db = new Db();
        $sql = "DELETE FROM user WHERE UserID = ".$id;
        // $result = $db->query_execute($sql);
        $query = mysqli_query($db->connect(), $sql);
        return $query;
    }
    // duyệt 
      public function verify($id){
        $db = new Db();
        $sql = "UPDATE user SET Status = 1 WHERE UserID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }


    public function list_user(){
        $db = new Db();
        $sql = "SELECT * FROM user";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public function get_user($id){
        $db = new Db();
        $sql = "SELECT * FROM user where UserID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    public function login($user,$pass){
        $db = new Db();
        $sql = "SELECT * FROM user where Username ='".$user."' and Password ='".md5($pass)."'"  ;  
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>