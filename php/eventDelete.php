<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(! $conn)
{
	die('Could not connect');
}

$db_selected = mysql_select_db(DB_NAME, $conn);


	if(! $db_selected)
	{
		die('Cannot use ' . DB_NAME . ': ' . mysql_error());
	}

  $Event_Name = test_input($_POST['Event_Name'])
	$sql = 'SELECT Event_ID FROM events WHERE Event_Name=$Event_Name';
	$retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }


	$sql2 =  "DELETE FROM events WHERE Event_ID=$retval";
	$retval2 = mysql_query($sql2, $conn);
	echo "DELETED <br>";
	 mysql_free_result($retval);

	mysql_close($conn);

?>
