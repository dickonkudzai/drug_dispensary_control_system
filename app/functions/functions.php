<?php
	include '../config/config.php';

	function getAccessLevels($connect){
		$query = "SELECT * FROM access_level";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Access Level</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['id'].'">'.$row['access_level'].'</option>';
		}

		return $output;
	}

	function getDrugCategories($connect)
	{
		$query = "SELECT * FROM category";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Category</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['category_id'].'">'.$row['category'].'</option>';
		}

		return $output;
	}

	function getDrugSuppliers($connect)
	{
		$query = "SELECT * FROM supplier";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Suppliers</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['supplier_id'].'">'.$row['supplier_name'].'</option>';
		}

		return $output;
	}

	function getDrugs($connect)
	{
		$query = "SELECT * FROM stock WHERE Blocked = 0";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Stock</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['stock_id'].'">'.$row['drug_name'].'</option>';
		}

		return $output;
	}

	function getPatient($connect)
	{
		$query = "SELECT * FROM patients";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Patient</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
		}

		return $output;
	}

	function getPaymentTypes($connect)
	{
		$query = "SELECT * FROM paymenttypes";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Payment Type</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['id'].'">'.$row['Name'].'</option>';
		}

		return $output;
	}

	function getUncontrolledDrugs($connect)
	{
		$query = "SELECT * FROM stock WHERE controlled = 0 AND Blocked = 0";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '<option value="">Select Stock</option>';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			# code...
			$output .= '<option value="'.$row['stock_id'].'">'.$row['drug_name'].'</option>';
		}

		return $output;
	}

	function getUsers($connect)
	{
		$query = "SELECT u.id, u.username,u.first_name, u.last_name, u.dob, a.access_level, u.status
			FROM users u 
			INNER JOIN access_level a ON u.access_level = a.id";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// code...
			$output .= '<tr>';
				$output .= '<td>'.$row['id'].'</td>';
				$output .= '<td>'.$row['username'].'</td>';
				$output .= '<td>'.$row['first_name'].'</td>';
				$output .= '<td>'.$row['last_name'].'</td>';
				$output .= '<td>'.$row['dob'].'</td>';
				$output .= '<td>'.$row['access_level'].'</td>';
				if ($row['status']==1) {
					// code...
					$status = '<span class="badge badge-success">Active</span>';
				}
				else{
					$status = '<span class="badge badge-danger">Deactive</span>';
				}
				$output .= '<td class="text-center">'.$status.'</td>';
				$output .= '<td><a class="dropdown-item edit" href="#" id="'.$row['id'].'" >Edit</a><a class="dropdown-item delete" href="#" id="'.$row['id'].'" >Delete</a></td>';
			$output .= '</tr>';
		}

		return $output;
	}

	function getPatients($connect)
	{
		$query = "SELECT * FROM patients";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// code...
			$output .= '<tr>';
				$output .= '<td>'.$row['id'].'</td>';
				$output .= '<td>'.$row['first_name'].'</td>';
				$output .= '<td>'.$row['last_name'].'</td>';
				if ($row['status']==1) {
					// code...
					$status = '<span class="badge badge-success">Active</span>';
				}
				else{
					$status = '<span class="badge badge-danger">Deactive</span>';
				}
				$output .= '<td class="text-center">'.$status.'</td>';
				$output .= '<td><a class="dropdown-item edit" href="#" id="'.$row['id'].'" >Edit</a><a class="dropdown-item delete" href="#" id="'.$row['id'].'" >Delete</a></td>';
			$output .= '</tr>';
		}

		return $output;
	}

	function getStock($connect)
	{
		$query = "SELECT * FROM stock";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// code...
			$output .= '<tr>';
				$output .= '<td>'.$row['stock_id'].'</td>';
				$output .= '<td>'.$row['drug_name'].'</td>';
				$output .= '<td>'.$row['quantity'].'</td>';
				$output .= '<td>'.$row['price'].'</td>';
				if ($row['controlled']==1) {
					// code...
					$controlled = '<span class="badge badge-warning">Yes</span>';
				}
				else{
					$controlled = '<span class="badge badge-success">No</span>';
				}
				if ($row['status']==1) {
					// code...
					$status = '<span class="badge badge-success">Active</span>';
				}
				else{
					$status = '<span class="badge badge-danger">Deactive</span>';
				}
				if ($row['Blocked']==1) {
					// code...
					$blocked = '<span class="badge badge-success">No</span>';
				}
				else{
					$blocked = '<span class="badge badge-danger">Yes</span>';
				}
				$output .= '<td class="text-center">'.$controlled.'</td>';
				$output .= '<td class="text-center">'.$status.'</td>';
				$output .= '<td class="text-center">'.$blocked.'</td>';
				$output .= '<td><a class="dropdown-item edit" href="#" id="'.$row['stock_id'].'" >Edit</a><a class="dropdown-item delete" href="#" id="'.$row['stock_id'].'" >Delete</a></td>';
			$output .= '</tr>';
		}

		return $output;
	}

	function getPrescrition($connect)
	{
		$query = "SELECT p.*, pa.first_name, pa.last_name FROM prescription p INNER JOIN patients pa ON p.patient_id = pa.id";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// code...
			$output .= '<tr>';
				$output .= '<td>'.$row['id'].'</td>';
				$output .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
				$output .= '<td>'.$row['date'].'</td>';
				if ($row['status']==1) {
					// code...
					$status = '<span class="badge badge-success">Active</span>';
				}
				else{
					$status = '<span class="badge badge-danger">Deactive</span>';
				}
				$output .= '<td class="text-center">'.$status.'</td>';
				$output .= '<td><a class="dropdown-item edit" href="#" id="'.$row['id'].'" >Edit</a><a class="dropdown-item delete" href="#" id="'.$row['id'].'" >Delete</a></td>';
			$output .= '</tr>';
		}

		return $output;
	}

	function selectPrescriptions($connect)
	{
		$query = "SELECT p.*, pa.first_name, pa.last_name FROM prescription p INNER JOIN patients pa ON p.patient_id = pa.id";
		$statement = $connect->prepare($query);
		$statement->execute();
		$output = '';
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			// code...
			$output .= '<li class="">';
				$output .= '<a href="#" class="selectedPrescription" id="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].' - '.$row['phone'].' / '.$row['date'].'</a>';
			$output .= '</li>';
		}
		return $output;
	}
?>