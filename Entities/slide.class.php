<?php
	 require_once('config/db.class.php');
	 class Slide{  
    	public $slidename;

    	 public function __construct($slidename){
	 	$this->slidename = $slidename; 
	 }
	 
	 
     public function listproduct(){
        $db = new Db();
        $sql = "SELECT * FROM slide";
        $result = $db->select_to_array($sql);
        return $result;
    }
	 }

	

?>