<?php

class Connection
{
    //singleton
    private static $conn;
    public $sql;
    public $res;
    public $error;
    public $data = array();  // blank array
    public $numRows;
    public $affectedRows;

    public function __construct(){
	//do nothing
    }
    // private function Connection()
    // {
    //     //do nothing
    // }//constructor ends

    public static function makeConnection(
    	$host = "localhost", 
    	$user = "root", 
    	$pwd = "", 
    	$db="wtlab")
    {
        if(Connection::$conn == null ){
            Connection::$conn = mysqli_connect("$host","$user", "$pwd", "$db") or
            trigger_error("The databases could not be connected");
        }
        return Connection::$conn;
}
public function close()
{
    // TODO: Implement __destruct() method.
    mysqli_close(Connection::$conn);
  // echo "The connectivity has benn terminated";
}

}//class ends
?>