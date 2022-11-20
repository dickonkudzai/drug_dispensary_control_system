<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if($_POST['action']=='add-patient')
		{
			
			$query = "INSERT INTO patients (first_name, last_name) VALUES(:first_name, :last_name)";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':first_name' => $_POST['first_name'], 
					':last_name' => $_POST['last_name']
				)
			);
			$statement = $connect->query("SELECT LAST_INSERT_ID()");
			$patient_id = $statement->fetchColumn();

			$alert = 'Successfully Added!';
			$icon = 'success';
			$title = 'Good Job!';
			$text = 'Patient Successfully Added.';
			$returnarray = [$patient_id, $alert, $icon, $title, $text];

			echo json_encode($returnarray);
			
		}
	}
?>