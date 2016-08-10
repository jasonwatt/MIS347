<?php
       session_start();
       // Create connection
       $conn = new mysqli('localhost','','','skecomplaints'); // $config['username'], $config['password'],

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

       function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


       echo "Connected successfully";

       //get post field
       $User_Name = test_input($_POST['uname']);
       $Picture = test_input($_POST['picture']);
       $Email = test_input($_POST['email']);
       $Status = test_input($_POST['status']);
       $Events = test_input($_POST['events']);
       $Groups = test_input($_POST['groups']);
       $Timestamp = $_SERVER['REQUEST_TIME'];

      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";


         $sql = "INSERT INTO user (Profile_Pic, User_Name, Email, Status, Events, Groups, Last_Active)
       VALUES('$Picture', '$User_Name', '$Email','$Status','$Events','$Groups', '$Timestamp')";

       if($conn->query($sql) === TRUE){
         echo "Value Inserted successfully";
         //Indicate that the person has been registered
       }
       else
         echo " Error: " . $sql . "<br>" . $conn->error;
       $conn->close();

?>
