<?php
       session_start();
       // Create connection
       $conn = new mysqli('localhost','ske','ske','skecomplaints'); // $config['username'], $config['password'],

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }


       echo "Connected successfully";

       //get post field
       $Event_Name = test_input($_POST['Event_Name']);
       $Street = test_input($_POST['Street']);
       $Users = test_input($_POST['users']);
       $Groups = test_input($_POST['groups']);
       $Start_Date = test_input($_POST['Start_Date']);
       $End_Date = test_input($_POST['End_Date']);
       $City = test_input($_POST['City']);
       $Zip = test_input($_POST['Zip']);
       $State = test_input($_POST['State']);


      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";
      $target_id = $_SESSION['Event_ID'];
       $session = $_SESSION['sessionUserID'];
         $sql = "UPDATE events SET Event_Name='$Event_Name', Start_Date='$Start_Date', End_Date='$End_Date', Address='$Address', $Locations WHERE Event_Name='$target_id'";

       if($conn->query($sql) === TRUE){
         echo "Value Updated successfully";
         //Indicate that the person has been registered
         header('Location: userAdd_admin.php');
       }
       else
         echo " Error: " . $sql . "<br>" . $conn->error;
       $conn->close();


       //To prevent sqlInjectio4n
       function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
       }
?>
