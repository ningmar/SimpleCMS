<?php session_start();
require_once '../../core/database/Connection.php';
require_once '../../core/classes/posts.php';
if(isset($_POST['submit']) || isset($_GET['edit']))
{
		// $title = 'title whsat ';
		// $description = 'what soveer description';
		$title = strtoupper($_POST['title']);
		$description = $_POST['content'];
		//image setting
		 if ($_FILES) {
		 	$fileName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
		    // $type = $_FILES['image']['type'];
		    // echo "The file type = " . $type;
		    $permanent_name = date('y_m_d_h_i_s_') . $fileName;
		    $permanent_location = '../../img/' . $permanent_name;
		    $local = '/webTProject/img/' . $permanent_name;
		    //////////////////////////////////////////////////////////
		    move_uploaded_file($tmpName, $permanent_location); //&& ($type == "image/jpeg" || $type = "image/png")) {
		}
		$category = $_POST['category'];
		$author = $_SESSION['username'];
		
		$obj = new Post();
		$obj->setTitle($title);
		$obj->setDescription($description);
		$obj->setCategory($category);
		$obj->setImage($local);
		$obj->setAuthor($author);
	if(isset($_POST['submit'])){
		// $obj->insert();
		if (!$obj->add()) {
			$error = base64_encode("Some serious error has occured.Something missing maybe. Try again later");
			header("location:../index.php?error=$error");
		} else {
			$success = base64_encode("Okay successfully inserted");
			header("location:../index.php?success=$success");
		}
	}
	if(isset($_GET['edit'])){
		// $obj->update or edit bu taking the value
		$edit_id = $_GET['edit'] ;
		$obj->setPost_Id($edit_id);
		// $obj->edit();
		if ($obj->edit()) { //echo 'hmm j n';
			$success = base64_encode("Okay successfully updated");
			header("location:../index.php?success=$success");
		} else {
			// echo 'sorrow';
			$error = base64_encode("Some serious error has occured.Couldnot edited. Try again later");
			header("location:../add_new_post.php?error=$error");			
		}
	}
		// $con = Connection::makeConnection();
		// //sql
		// $sql = "SELECT * FROM login";
		// $res = mysqli_query($con, $sql);
		// $numRows = mysqli_num_rows($res);
		// if ($numRows > 0) {
		// 	while($data = mysqli_fetch_object($res)){
		// var_dump($data);
		//     }
		    
		// }
}
if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
	$post = new Post();
	$post->setPost_Id($post_id);
	if ($post->temp_delete(0)) {
		header('location:../index.php?success='.base64_encode('The post has been deleted successfully!'));
	}
	else{
		header('location:../index.php?error='.base64_encode('Some error while deleting the post'));
	}
}
?>