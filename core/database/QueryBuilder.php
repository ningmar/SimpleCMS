<?php
//
/**
* 
*/
class QueryBuilder extends Connection
{
	
	function __construct()
	{
		# code...
	}
	//make universal function for fetching the value
	public function selectAll($table)
	{
		//make connection
		$con = Connection::makeConnection();
		//prepare the sql
		$this->sql = "SELECT * FROM {$table}";
		$this->res = mysqli_query($con,$this->sql)
            or trigger_error(mysqli_error($con));

	}
}
?>