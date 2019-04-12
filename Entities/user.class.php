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
    public $Status; 
    public $DepartmentID ;

    public function __construct($fullname, $username, $password, $address, $phone, $status, $departmentID){
        $this->FullName = $fullname;
        $this->Username = $username;
        $this->Password = $password;
        $this->Address = $address;
        $this->Phone = $phone; 
        $this->Status = $status; 
        $this->DepartmentID = $departmentID; 
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO user (FullName, Username, Password, Address, Phone, Status, DepartmentID ) VALUES ('$this->FullName','$this->Username','$this->Password','$this->Address',' $this->Phone', '$this->Status' , '$this->DepartmentID')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id){
        $db = new Db();
        $sql = "UPDATE user SET FullName = '$this->FullName' , Username = '$this->Username', Password = '$this->Password', Address = '$this->Address', Phone = '$this->Phone', DepartmentID = '$this->DepartmentID' WHERE UserID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }

    // Khóa tài khoản. 
    public function delete($id){
        $db = new Db();
        $sql = "UPDATE  user SET Status = 2 WHERE UserID = ".$id;
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
     // duyệt 
      public function mokhoa($id){
        $db = new Db();
        $sql = "UPDATE user SET Status = 1 WHERE UserID =".$id;
        $result = $db->query_execute($sql);
        return $result;
    }


    public function list_user(){
        $db = new Db();
        $sql = "SELECT * FROM user , department where user.DepartmentID = department.DepartmentID";
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
        $sql = "SELECT * FROM user , department where user.DepartmentID = department.DepartmentID and  Username ='".$user."' and Password ='".md5($pass)."'"  ;  
        $result = $db->query_execute($sql);
        return $result;
    }
     public function Logout($userID){
        $db = new Db();
        $sql = "UPDATE  user SET loginstatus = 0 WHERE UserID =".$userID;
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>