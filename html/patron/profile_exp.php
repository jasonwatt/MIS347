<?php
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints'); // $config['username'], $config['password'],
   
        session_start(); 
  


    // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       } 
    try {
		
    $User_ID= $_SESSION["sessionUserID"]; 
    } catch (Exception $e) {
      header('Location: ../html/Login.html');
    }

    $sql = "SELECT User_ID, Username, Profile_Pic, Email, User_Type FROM user WHERE User_ID= ".$User_ID." ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {            
    $User_ID= $row["User_ID"];
    $Username= $row["Username"];
    $User_Type= $row["User_Type"];
    $Email= $row["Email"];
	$Profile_Pic = $row["Profile_Pic"];
    break;
	
  }
  ?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron_home.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron/profile_patron.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>



    <ul id="nav-mobile" class="side-nav fixed sideNav">
        <br>
        <br>
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">
            <div class="nav-wrapper">
                <a href="#!" class="dashboardHeader brand-logo">Patron Profile</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">Profile</a></li>
                    <li><a href="badges.html">Groups</a></li>
                    <li><a href="collapsible.html">Events</a></li>
                    <li><a href="mobile.html">Issues</a></li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="card">
            <form class="col s12 l12 m6">

                <div class="card-header">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode( $Profile_Pic ); ?>" />
                </div>
                <div class="card-content">
                    <h5><?php echo "$Username"; ?></h5>
                    <br />
                    <h6><?php echo "$Email"; ?></h6>
                </div>

                <a class="btn-floating btn-large waves-effect waves-light red right" id="pp_fab"><i class="material-icons">mode_edit</i></a>

            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</body>

</html>
