<?php
	include '../config/config.php';

	if(isset($_POST['action']))
	{
		if($_POST['action']=='getDrugPrice')
		{
			$query = "SELECT price FROM stock WHERE stock_id = :stock_id";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':stock_id'=>$_POST['drug_id']
				)
			);
			$result = $statement->fetchAll();
			$output = '';
			foreach ($result as $row) {
				// code...
				$output = $row['price'];
			}

			echo $output;
		}

		if($_POST['action']=='add-sale')
		{
			try
			{
				$query = "INSERT INTO invoice (patient, served_by, payment_type) VALUES(:patient, :served_by, :payment_type)";
				$statement = $connect->prepare($query);
				$statement->execute(
					array(
						':patient'=>$_POST['patient'],
						':served_by'=>$_POST['served_by'],
						':payment_type'=>$_POST['payment_type']
					)
				);
				$statement = $connect->query("SELECT LAST_INSERT_ID()");
				$invoice_id = $statement->fetchColumn();

				for ($i=0; $i < count($_POST['drug']); $i++) { 
					// code...
					$query_lines = "INSERT INTO invoice_details (invoice, drug, cost, quantity) VALUES(:invoice, :drug, :cost, :quantity)";
					$statement_lines = $connect->prepare($query_lines);
					$statement_lines->execute(
						array(
							':invoice'=>$invoice_id,
							':drug'=>$_POST['drug'][$i],
							':cost'=>$_POST['cost'][$i],
							':quantity'=>$_POST['quantity'][$i]
						)
					);
				}

				$alert = 'Successfully Paid!';
				$icon = 'success';
				$title = 'Good Job!';
				$text = 'Payment successfull!';
				$returnarray = [$invoice_id, $alert, $icon, $title, $text];

				echo json_encode($returnarray);
			}
			catch(Exception $e)
			{
				$message = $e->getMessage();
				$invoice_id = 0;
				$icon = 'error';
				$title = 'Oops...';
				$text = $message;
				$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong!<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
				$returnarray=[$invoice_id, $message, $icon, $title, $text];
				echo json_encode($returnarray);
			}
		}

		if($_POST['action']=='get-prescription')
		{
			$query = "SELECT * FROM prescription WHERE id = :prescription_id";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':prescription_id'=>$_POST['prescription_id']
				)
			);
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				// code...
				$prescription = $_POST['prescription_id'];
				$patient_id = $row['patient_id'];
			}
			$output=[$prescription, $patient_id];

			echo json_encode($output);
		}

		if($_POST['action']=='get-prescription-items')
		{
			$query = "SELECT pd.*, s.price FROM prescription_details pd 
			INNER JOIN stock s ON pd.drug_id = s.stock_id
			WHERE pd.pres_id = :prescription_id";
			$statement = $connect->prepare($query);
			$statement->execute(
				array(
					':prescription_id'=>$_POST['prescription_id']
				)
			);
			$result = $statement->fetchAll();
			$items = array();
			foreach ($result as $row) {
				// code...
				$drug = $row['drug_id'];
				$quantity = $row['quantity'];
				$price = $row['price'];
				$items[] = array(
					'drug_id'=>$row['drug_id'],
					'quantity'=>$row['quantity'],
					'price'=>$row['price']
				);
			}
			
			echo json_encode($items);
		}
	}
?>