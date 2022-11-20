<?php
include_once('connect_db.php');
		$expiry=$_POST['expiry'];
		$expiry=$_POST['expiry'];
		if(mysql_query("INSERT INTO expiry(expiry,date_supplied)VALUES('$expiry', NOW())"))
		{
			$form = false;
		}
		else
		{
			echo "try again";
		}
?>
<!DOCTYPE html>
<html>
<body>
<?php

include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM expiry ")or die(mysql_error());
		// display data in table
        echo "<table '>";
        echo "<thead><tr> <th>id</th><th>expiry</th> <th>date supplied</th><th>days left</th></tr><thead>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
        	echo "<tbody>";
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['expiry'] . '</td>';
				echo '<td>' . $row['date_supplied'] . '</td>';
        	$j = $row['id'];
        	$i = 0;
        	do {
        		$date = $row['expiry'];
    			$date3=strtotime($date);
				$date2=strtotime("now");
				$diff2=$date3-$date2;
				$res = floor($diff2/(60*60*24));
				echo '<td>' .$res. '</td>';
				$i++;
        		# code...
        	} while ( $i <= 0);
    //     	for ($i=0; $i <= $j ; $i++) { 
    //     		# code...
    //     		$date = $row['expiry'];
    //     		$date3=strtotime($date);
				// $date2=strtotime("now");
				// $diff2=$date3-$date2;
				// $res = floor($diff2/(60*60*24));
				// echo '<td>' .$res. '</td>';
    //     	}
				?>
				<?php
				
		 } 
        // close table>
        echo "</table>";
?>
<form action="expiry_trial.php" method="post">:
  <input type="date" name="expiry" id="expiry">
  <input type="submit">
</form>
</body>
</html>