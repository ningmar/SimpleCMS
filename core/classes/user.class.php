<?php
session_start();
/**
* 
*/
class User extends Connection
{
	private $uid;
	private $username;
	private $email;
	private $password;
	private $permission;
	function __construct()
	{
		# code...
	}
     //setter and getter for alll of the private members
	public function setUserId($uid)
	{
		$this->uid = $uid;
	}
	public function getUserId()
	{
		return $this->uid;
	}
	public function setUsername($username)
	{
		$this->username = $username;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function setPermission($permission)
	{
		$this->permission = $permission;
	}
	public function getPermission()
	{
		return $this->permission;
	}
	//defining all of the functions

	//login function to login admin
	public function loginAdmin()
	{
        //prepare the connection
        $conn = Connection::makeConnection();
        //prepare the sql
        $this->sql = "SELECT * FROM users WHERE 
                  permission IN ('admin', 'editor') AND 
                  username = '$this->username' AND 
                  password = '$this->password'";
        $this->res = mysqli_query($conn,$this->sql)
            or trigger_error(mysqli_error($conn));
        $this->numRows = mysqli_num_rows($this->res);
        if($this->numRows > 0){
            $this->data = mysqli_fetch_object($this->res);
            $_SESSION['uid'] = $this->data->uid;
            $_SESSION['username'] = $this->data->username;
            $_SESSION['password'] = $this->data->password;
            return true;
        }else{
            return false;
        }

    }//method ends
    //login function to login every users
	public function loginUser()
	{
        //prepare the connection
        $conn = Connection::makeConnection();
        //prepare the sql
        $this->sql = "SELECT * FROM users WHERE 
        -- permission = 'subscriber' AND 
                  username = '$this->username' AND 
                  password = '$this->password'";
        $this->res = mysqli_query($conn,$this->sql)
            or trigger_error(mysqli_error($conn));
        $this->numRows = mysqli_num_rows($this->res);
        if($this->numRows > 0){
            $this->data = mysqli_fetch_object($this->res);
            $_SESSION['uid'] = $this->data->uid;
            $_SESSION['username'] = $this->data->username;
            $_SESSION['password'] = $this->data->password;
            return true;
        }else{
            return false;
        }

    }
    //method to logout
    public function logout()
    {
    	//established connection $
    	$con = Connection::makeConnection();
    	// unset($_SESSION['username']); //not suitable    		   
	   	session_destroy();//destroy
	   	// echo "success";
	}

    //methods to change password
    public function changePassword()
    {
        //established connection
        $con = Connection::makeConnection();
        //prepare sql to change password
        $this->sql = "UPDATE users SET password = '$this->password' WHERE uid = '$this->uid'";
        //execute sql
        mysqli_query($con,$this->sql)
            or trigger_error(mysqli_error($con));   
    }

    //signup function
    public function signup()
    {
        //established connection
        $con = Connection::makeConnection();
    	// //prepare the sql
   		$this->sql = 'INSERT INTO users (username, email, password, permission)
   		 VALUES ("'.$this->username.'", "'.$this->email.'", "'.$this->password.'", "'.$this->permission.'")';
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
    
    //fetching all the subscribers
    public function fetchAllSubscriber()
    {
        //prepare the connection
        $conn = Connection::makeConnection();
        //prepare the sql
        $this->sql = "SELECT * FROM users WHERE permission = 'subscriber'";
        $this->res = mysqli_query($conn,$this->sql)
            or trigger_error(mysqli_error($conn));
        $this->numRows = mysqli_num_rows($this->res);
        if ($this->numRows > 0 ) {
        while ($row = mysqli_fetch_assoc($this->res)) {
          array_push($this->data, $row);
        }
        return $this->data;
      }

    }

}

?>