<?php 
if(isset($_POST['submit'])){
	$name = $_FILES['file']['name'];
	$extension = strtolower(substr($name,strpos($name, '.')+1));
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];
	$max_size = 1000000;

	$tmp_name = $_FILES['file']['tmp_name'];

	if(isset($name)){
		if(!empty($name)){
			if(($extension=='jpg'||$extension=='jpeg')&&($type=='image/jpeg'||$type=='image/jpg')&&$size<=$max_size){
				$location = 'uploads/';
				if(move_uploaded_file($tmp_name, $location.$name)){
					echo 'File uploaed.';
				}else{
					echo 'There was an error.';
				}
			}else{
				echo 'File must be jpg/jpeg and 2mb or less.';
			}
		}

	}
}

?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><br><br>
	<input type="submit" name="submit" value="Submit">
</form>