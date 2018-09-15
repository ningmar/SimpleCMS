<?php


/**
* 
*/
class Comment extends Connection
{
	public $con;
	function __construct()
	{
		 $this->con= Connection::makeConnection();
	}

	//members
	private $cid;
	private $comment;
	private $commentor;
	private $pid;
	 // private $comment_time
	// private $

	//setter and getter

	public function setPId($pid){
   		$this->pid = $pid;
   	}
   	public function getPId(){
   		return $this->pid;
   	}
 //   	public function commentTime($comment_time){
 //   		$this->post_id = $post_id;
 //   	}
   	// public function getPost_Id(){
   	// 	return $this->comment_time;
   	// }
   	public function setComment_Id($cid){
   		$this->cid = $cid;
   	}
   	public function getComment_Id(){
   		return $this->cid;
   	}
   	public function setComment($comment){
   		$this->comment = $comment;
   	}
   	public function getComment(){
   		return $this->comment;
   	}
   	public function setCommentor($commentor){
   		$this->commentor = $commentor;
   	}
   	public function getCommentor(){
   		return $this->commentor;
   	}

   	public function comment()
   	{
   		//$con = Connection::makeConnection();
   		//sql to insert
   		// $this->sql = 'INSERT INTO comments (pid, comment, commentor) VALUES ("'.$this->pid.'", "'.$this->comment.'", "'.$this->commentor.'")';
   		$this->sql = "INSERT INTO comments (pid, comment, commentor) VALUES ('$this->pid', '$this->comment', '$this->commentor')";
   		// echo "$this->sql";
   		//execute
   		$this->res = mysqli_query($this->con, $this->sql);
   		 //check for affected rows that is increase or decrease in no of rows in table
         $this->affectedRows = mysqli_affected_rows($this->con);
         //if affected rows are greater than 0 then record are inserted successfully else return false
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
   	}

   	public function fetchAll()
   	{
   		//$con = Connection::makeConnection();
   		//sql
   		$this->sql = "SELECT * from comments WHERE pid='$this->pid' ORDER BY comment_time DESC";
   		// echo $this->sql; 
   		//execute sql
   		$this->res = mysqli_query($this->con, $this->sql);
   		// var_dump($this->res);
   		//check for changes in rows
   		$this->numRows = mysqli_num_rows($this->res);
   		if ($this->numRows > 0 ) {
   			while ($row = mysqli_fetch_assoc($this->res)) {
   				array_push($this->data, $row);
   			}
   			return $this->data;
   		}
   	}
}