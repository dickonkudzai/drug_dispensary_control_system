<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if($_POST['action']=='add-prescription')
		{
			
			$query = "INSERT INTO prescription (patient_id, postal_address, phone) VALUES(:patient_id, :postal_address, :phone)";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':patient_id'=>$_POST['patient'],
					':postal_address'=>$_POST['postal_address'],
					':phone'=>$_POST['phone']
				)
			);
			$statement = $connect->query("SELECT LAST_INSERT_ID()");
			$prescription_id = $statement->fetchColumn();

			if(isset($_POST['drug_id']))
			{
				for ($i=0; $i < count($_POST['drug_id']); $i++) { 
					// code...
					$query = "INSERT INTO prescription_details (pres_id, drug_id, strength, dose, quantity) VALUES(:pres_id, :drug_id, :strength, :dose, :quantity)";
					$statement = $connect->prepare($query);
					$statement->execute(
						array(
							':pres_id'=>$prescription_id,
							':drug_id'=>$_POST['drug_id'][$i],
							':strength'=>$_POST['strength'][$i],
							':dose'=>$_POST['dose'][$i],
							':quantity'=>$_POST['quantity'][$i]
						)
					);
				}
			}

			$alert = 'Successfully Added!';
			$icon = 'success';
			$title = 'Good Job!';
			$text = 'Drug Successfully Added.';
			$returnarray = [$prescription_id, $alert, $icon, $title, $text];

			echo json_encode($returnarray);
			
		}
	}
?>