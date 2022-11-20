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
       $result = mysql_query("SELECT expiry FROM expiry where id = '5'")or die(mysql_error());
		// display data in table
        echo "<table '>";
        echo "<thead><tr> <th>id</th><th>expiry</th> <th>date supplied</th></tr><thead>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tbody>";
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['expiry'] . '</td>';
				echo '<td>' . $row['date_supplied'] . '</td>';
				?>
				<?php
				$date = $row['expiry'];
		 } 
        // close table>
        echo "</table>";
$date3=strtotime($date);
	$date1=strtotime("2018-08-28");
	//$result = mysql_query("SELECT * FROM expiry ")or die(mysql_error());
	//$result1=mysql_fetch_array($result);
	//echo $result;
	$date2=strtotime("now");
	//$diff=date_diff($date1,$date2);
	$diff1=$date1-$date2;
	//echo $date1;
	//echo $date2;
	//echo $diff ->date_format("%a");
	$diff2=$date3-$date2;
	echo 'Days - '.floor($diff1/(60*60*24));
	echo 'Days - '.floor($diff2/(60*60*24));
?>
<form action="expiry_trial.php" method="post">:
  <input type="date" name="expiry" id="expiry">
  <input type="submit">
</form>
</body>
</html>