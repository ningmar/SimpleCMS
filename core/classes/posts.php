<?php

   // require_once '../database/Connection.php';

   /**
   * 
   */
   class Post extends Connection
   {
   	//variables for the posts
   	private $post_id;
   	private $title;
   	private $description;
   	private $image;
   	private $category;
   	private $author;
   	// private $comment_id;
   	private $status;
   	//setters and getters for the variables and all

   	public function setPost_Id($post_id){
   		$this->post_id = $post_id;
   	}
   	public function getPost_Id(){
   		return $this->post_id;
   	}
   	public function setTitle($title){
   		$this->title = $title;
   	}
   	public function getTitle(){
   		return $title;
   	}
   	public function setDescription($description){
   		$this->description = $description;
   	}
   	public function getDescription(){
   		return $description;
   	}
   	public function setImage($image){
   		$this->image = $image;
   	}
   	public function getImage(){
   		return $image;
   	}
   	public function setCategory($category){
   		$this->category = $category;
   	}
   	public function getCategory(){
   		return $category;
   	}

   	public function setAuthor($author){
   		$this->author = $author;
   	}
   	public function getAuthor(){
   		return $author;
   	}
   	// public function setComment_Id($comment_id){
   	// 	$this->comment_id = $comment_id;
   	// }
   	// public function getComment_Id(){
   	// 	return $comment_id;
   	// }

   	public function setStatus($status){
   		$this->status = $status;
   	}
   	public function getStatus(){
   		return $status;
   	}
   	function __construct()
   	{
   		# code... do nothing 
   	}
   	/*
   	*creating the crude function for the post model
   	*/
//insert function
   	public function add()
   	{
   		//make the connection
   		$con = Connection::makeConnection();
   		// //prepare the sql
   		$this->sql = 'INSERT INTO posts (title, description, image, category, author)
   		 VALUES ("'.$this->title.'", "'.$this->description.'", "'.$this->image.'", "'.$this->category.'", "'.$this->author.'")';

         //$this->sql = "INSERT INTO posts (title, description, category)
          //VALUES ('$this->title', '$this->description', '$this->category')";
   		 //execute the sql query if not then trigger error
   		 $this->res = mysqli_query($con, $this->sql) or trigger_error(mysqli_error($con));
   		 //check for affected rows that is increase or decrease in no of rows in table
         $this->affectedRows = mysqli_affected_rows($con);
         //if affected rows are greater than 0 then record are inserted successfully else return false
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
    }
   	//function to update or edit and all
   	public function edit()
   	{
   		//make the connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = 'UPDATE posts SET title = "'.$this->title.'", description = "'.$this->description.'", image = "'.$this->image.'", category = "'.$this->category.'"
   		              WHERE post_id = "'.$this->post_id.'"';
   		              // echo $this->sql;
   		//execute sql
   		mysqli_query($con, $this->sql) or 
         trigger_error(mysqli_error($con));
         $this->affectedRows = mysqli_affected_rows($con);
         //affected rows for update
         // var_dump($this->affectedRows);
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
   	}

   	//function to delete
   	public function delete()
   	{
   		//make connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = "DELETE FROM posts WHERE post_id = $this->post_id";//delete image//unlink('image');
   		//execute sql
   		mysqli_query($con, $this->sql) or trigger_error(mysqli_error($con));
         $this->affectedRows = mysqli_affected_rows($con);
         //affected rows for update
         // var_dump($this->affectedRows);
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
   	}
      //function to fake delete
      public function temp_delete($status)
      {
         //make connection
         $con = Connection::makeConnection();
         //prepare sql
         $this->sql = "UPDATE posts SET status =
          '$status' WHERE post_id = 
          '$this->post_id'";
         //execute sql
         mysqli_query($con, $this->sql) or
         trigger_error(mysqli_error($con));
         $this->affectedRows = mysqli_affected_rows($con);
         //affected rows for update
         // var_dump($this->affectedRows);
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
      }
   	//function to fetch
   	public function select()
   	{
   		//make connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = "SELECT * FROM posts WHERE status = '1'  DESC";
   		//execute sql
   		$this->res = mysqli_query($con, $this->sql);
   		//check for changes in rows
   		$this->numRows = mysqli_num_rows($this->res);
   		if ($this->numRows > 0 ) {
   			while ($row = mysqli_fetch_assoc($this->res)) {
   				array_push($this->data, $row);
   			}
   			return $this->data;
   		}
   	}
    public function selectView()
    {
      //make connection
      $con = Connection::makeConnection();
      //prepare sql
      $this->sql = "SELECT * FROM posts";
      //execute sql
      $this->res = mysqli_query($con, $this->sql);
      //check for changes in rows
      $this->numRows = mysqli_num_rows($this->res);
      if ($this->numRows > 0 ) {
        while ($row = mysqli_fetch_assoc($this->res)) {
          array_push($this->data, $row);
        }
        return $this->data;
      }
    }
   	public function selectCat($status, $category)
   	{
   		//make connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = "SELECT * FROM posts WHERE status = '$status' AND category = '$category' ORDER BY post_time DESC";
   		// echo "$this->sql";
   		//execute sql
   		$this->res = mysqli_query($con, $this->sql);
   		//check for changes in rows
   		$this->numRows = mysqli_num_rows($this->res);
   		if ($this->numRows > 0 ) {
   			while ($row = mysqli_fetch_assoc($this->res)) {
   				array_push($this->data, $row);
   			}
   			return $this->data;
   		}
   	}
   	public function selectBlogs($status)
   	{
   		//make connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = "SELECT * FROM posts WHERE status = '$status' AND
                       category IN ('blog_programming', 'blog_lifelession') ORDER BY post_time DESC";
   		//execute sql
   		$this->res = mysqli_query($con, $this->sql);
   		//check for changes in rows
   		$this->numRows = mysqli_num_rows($this->res);
   		if ($this->numRows > 0 ) {
   			while ($row = mysqli_fetch_assoc($this->res)) {
   				array_push($this->data, $row);
   			}
   			return $this->data;
   		}
   	}
   	public function selectHome() //selecting for home
   	{
   		//make connection
   		$con = Connection::makeConnection();
   		//prepare sql
   		$this->sql = "SELECT * FROM posts WHERE category = 'articles' AND status = 1 ORDER BY post_time DESC LIMIT 3";
   		//execute sql
   		$this->res = mysqli_query($con, $this->sql);
   		//check for changes in rows
   		$this->numRows = mysqli_num_rows($this->res);
   		if ($this->numRows > 0 ) {
   			while ($row = mysqli_fetch_assoc($this->res)) {
   				array_push($this->data, $row);
   			}
   			return $this->data;
   		}
   	}
    public function selectOne() //selecting for home
    {
      //make connection
      $con = Connection::makeConnection();
      //prepare sql
      $this->sql = "SELECT * FROM posts WHERE title = '$this->title' AND status = 1";
      //execute sql
      $this->res = mysqli_query($con, $this->sql);
      //check for changes in rows
      $this->numRows = mysqli_num_rows($this->res);
      if ($this->numRows > 0 ) {
        while ($row = mysqli_fetch_assoc($this->res)) {
          array_push($this->data, $row);
        }
        return $this->data;
      }
    }

    public function pageView()
    {
      //get connection
      $con = Connection::makeConnection();
      //sql
      $this->sql = "UPDATE posts SET hit = hit + 1 WHERE post_id = $this->post_id";
      //execute
      $this->res = mysqli_query($con, $this->sql) or
      trigger_error(mysqli_error($con));
         $this->affectedRows = mysqli_affected_rows($con);
         //affected rows for update
         // var_dump($this->affectedRows);
        if($this->affectedRows > 0){
           return true;
        }else{
           return false;
        }
    }

   }

?>