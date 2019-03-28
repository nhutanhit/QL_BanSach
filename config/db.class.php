<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<body>
    


<?php 

class Db
{
    protected static $connection;


    public function connect(){
        if(!isset(self::$connection)){
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost:3306", $config["username"], $config["password"], $config["databasename"]);
            mysqli_set_charset(self::$connection, 'utf8');
        }

        if(self::$connection == false){
            return false;
        }

        return self::$connection;
    }

    public function query_execute($queryString){
        $connection = $this->connect();
        $result = $connection->query($queryString);
        return $result;
    }

    public function query($queryString){
        $connection = $this->connect();
        $result = $connection->query($queryString);
        return $result;
    }

    public function select_to_array($queryString){
        $row = array();
        $result = $this->query_execute($queryString);
        if($result == false){
            return false;
        }

        while($item = $result->fetch_assoc()){
            $row[] = $item;
        }

        return $row;
    }
}

?>

</body>
</html>