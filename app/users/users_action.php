<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if($_POST['action']=='add-user')
		{
			$username = $_POST['username'];
			$query = "SELECT * FROM users WHERE username = :username";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':username'=>$username
				)
			);
			$found = $statement->rowCount();
			if($found>0)
			{
				$user_id = 0;
				$icon = 'error';
				$title = 'Oops...';
				$text = 'Username In Use!';
				$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username In Use!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
				$returnarray=[$user_id, $message, $icon, $title, $text];
				echo json_encode($returnarray);
			}
			else{
				$query = "INSERT INTO users (username, password, first_name, last_name, dob, access_level) VALUES(:username, :password, :first_name, :last_name, :dob, :access_level)";
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':username' => $username, 
						':password' => password_hash("12345678", PASSWORD_BCRYPT), 
						':first_name' => $_POST['first_name'], 
						':last_name' => $_POST['last_name'], 
						':dob' => $_POST['dob'], 
						':access_level'=>$_POST['access_level']
					)
				);
				$statement = $connect->query("SELECT LAST_INSERT_ID()");
				$user_id = $statement->fetchColumn();

				$alert = 'Successfully Added!';
				$icon = 'success';
				$title = 'Good Job!';
				$text = 'User Successfully Added. Your first time use password is 12345678';
				$returnarray = [$user_id, $alert, $icon, $title, $text];

				echo json_encode($returnarray);
			}
			
		}
	}
?>