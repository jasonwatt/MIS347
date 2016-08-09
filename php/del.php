<html>
<body>
<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');

$conn = new mysqli('localhost','ske','ske','skecomplaints'); // $config['username'], $config['password'],

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

	$issueID = ($_POST['userid']);

      $sql = "DELETE FROM user WHERE User_ID = '".$issueID."' ";  //1 for admin, 2 for ops, 3 for patron

      if($conn->query($sql)){
         echo "deleted";
      }
      else
        echo " Error: ";

      $conn->close();

?>
</body>
</html>
