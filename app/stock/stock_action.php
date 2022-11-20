<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if($_POST['action']=='add-stock')
		{
			
			$query = "INSERT INTO stock (drug_name, category, description, supplier, quantity, cost, price, controlled, date_supplied, expiry) VALUES(:drug_name, :category, :description, :supplier, :quantity, :cost, :price, :controlled, :date_supplied, :expiry)";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':drug_name'=>$_POST['drug_name'], 
					':category'=>$_POST['category'], 
					':description'=>$_POST['description'], 
					':supplier'=>$_POST['supplier'], 
					':quantity'=>$_POST['quantity'],
					':cost'=>$_POST['cost'], 
					':price'=>$_POST['price'], 
					':controlled'=>$_POST['controlled'], 
					':date_supplied'=>$_POST['date_supplied'], 
					':expiry'=>$_POST['expiry']
				)
			);
			$statement = $connect->query("SELECT LAST_INSERT_ID()");
			$patient_id = $statement->fetchColumn();

			$alert = 'Successfully Added!';
			$icon = 'success';
			$title = 'Good Job!';
			$text = 'Drug Successfully Added.';
			$returnarray = [$patient_id, $alert, $icon, $title, $text];

			echo json_encode($returnarray);
			
		}
	}
?>