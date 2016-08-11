<?php
session_start();
// Create connection
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');

    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	// $config['username'], $config['password'], // $config['username'], $config['password'],
	 if(! $conn)
{
	die('Could not connect');
}

       // Check connection
       $db_selected = mysql_select_db(DB_NAME, $conn);


	if(! $db_selected)
	{
		die('Cannot use ' . DB_NAME . ': ' . mysql_error());
	}


       echo "Connected successfully";

       //get post field
       $Event_Name = test_input($_POST['Event_Name']);
       $Locations = test_input($_POST['Locations']);
       $Address = test_input($_POST['Address']);
       $Street = test_input($_POST['Street']);
       $Events = test_input($_POST['events']);
       $Groups = test_input($_POST['groups']);
       $Start_Date = test_input($_POST['Start_Date']);
       $End_Date = test_input($_POST['End_Date']);
       $City = test_input($_POST['City']);
       $Zip = test_input($_POST['Zip']);
       $State = test_input($_POST['State']);


      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";

       $session = $_SESSION['sessionUserID'];
         $sql = "INSERT INTO events (Event_Name, Start_Date, End_Date, Address, Locations)
       VALUES('$Event_Name', '$Start_Date', '$End_Date','$Address','$Locations')";

       if(mysql_query($sql,$conn) === TRUE){
         echo "Value Inserted successfully";
         //Indicate that the person has been registered
         header('Location: userAdd_admin.php');
       }
       else
         echo " Error: " . $sql . "<br>" . $conn->error;
       mysql_close($conn);


       //To prevent sqlInjectio4n
       function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
       }
?>
