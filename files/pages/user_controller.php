<?php 
if ($_POST) {
	if (isset($_POST['register']))
	{
		$first_name = $_POST['fname'];
		$second_name = $_POST['sname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$country = $_POST['country'];
		$user_type = $_POST['user_type'];

		$sql = "insert into user_tbl (first_name, second_name, username, password, email, address, country, user_type)	
		values ('$first_name', '$second_name', '$username', '$password', '$email', '$address', '$country', '$user_type')";

		$user = new User();
		$result = $user->register($sql);
		if ($result) {
			//echo "Data Successfully Inserted.";
			header('Location: ?action=myaccount');
		} else {
			echo "Sorry input not accepted.";
		}

	} else if (isset($_POST['login'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "select * from user_tbl where username = '$username' and password= '$password'";
		$user = new User();
		$result = $user->login($sql);
		if ($result) {
			$_SESSION['userid'] = $result->user_id;
			header('Location: ?action=myaccount');
			echo "<script type= 'text/javascript'>
			alert('Login Successful');
			</script>";
		} else {
			
			//header('Location: ?action=login');
			echo "<script type= 'text/javascript'>
			alert('Wrong credentials. Please Try Again');
			</script>";

		}
	 } else if (isset($_POST['update'])) {

        //var_dump($_FILES);
        //die;

        $tmp_name = $_FILES["avatar"]["tmp_name"];

        $name = $_FILES["avatar"]["name"];


        move_uploaded_file($tmp_name, "uploads/$name");


        $id = $_GET['userid'];
        $user = new User();
        $username = $_POST['username'];
        $query = "update user_tbl set username='$username', pic='$name' where userid= '$user_id'";

        $result = $user->editPost($query);

        if ($result) {
            $_SESSION['success'] = "Updated successfully";
            header('Location: ?action=list');
        }
    }
}
?>