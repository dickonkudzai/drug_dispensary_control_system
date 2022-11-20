<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if ($_POST['action']=='login') {
			// code...
			$username = trim($_POST['username']);
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE username = :username and status = 1";

			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':username'=>$username
				)
			);
			$found = $statement->rowCount();

			if($found<1 || $found>1)
			{
				$user_id = 0;
				$url = "login";
				$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Passwords Do Not Match!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
				$returnarray = [$user_id, $message, $url];
				echo json_encode($returnarray);
			}
			else{
				$result = $statement->fetchAll();
				foreach($result as $row)
				{
					$firstname = $row["first_name"];
					$lastname = $row["last_name"];
					$access_level = $row["access_level"];
					$actual_password = $row["password"];
					$id = $row['id'];
				}
				if(password_verify($password, $actual_password))
				{
					$_SESSION['id'] = $id;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['access_level'] = $access_level;
					$_SESSION['username'] = $username;

					$user_id = $row["id"];
					$url = "app/home/index";
					$message = '<div class="alert alert-success alert-dismissible fade show" role="alert">Succesfully Logged In!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
					$returnarray = [$user_id, $message, $url];
					echo json_encode($returnarray);
				}
				else{
					$user_id = 0;
					$url = "login";
					$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Passwords Do Not Match!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
					$returnarray = [$user_id, $message, $url];
					echo json_encode($returnarray);
				}
			}
		}
	}
?>