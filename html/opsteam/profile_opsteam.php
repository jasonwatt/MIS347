<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../css/register.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/patron_home.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/patron/profile_patron.css"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>


    <ul id="nav-mobile" class="side-nav fixed sideNav">
        <br>
        <br>
        <li class="bold">
            <a href="http://localhost/MIS347/html/opsteam/profile_opsteam.php" class="waves-effect waves-teal">Profile</a>
        </li>
        <li class="bold">
            <a href="http://localhost/MIS347/html/opsteam/issueManagement_opsteam.php" class="waves-effect waves-teal">Issues</a>
        </li>
        <li class="bold">
            <a href="http://localhost/MIS347/html/opsteam/userManagement_opsteam.php" class="waves-effect waves-teal">Users</a>
        </li>
        <li class="bold">
            <a href="http://localhost/MIS347/html/opsteam/groupManagement_opsteam.php" class="waves-effect waves-teal">Groups</a>
        </li>
        <li class="bold">
            <a href="http://localhost/MIS347/html/opsteam/eventManagement_opsteam.php" class="waves-effect waves-teal">Events</a>
        </li>
    </ul>


    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">
            <div class="nav-wrapper">
                <a href="#!" class="dashboardHeader brand-logo">Patron Profile</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="dashboard_opsteam.html">Home</a></li>
                    <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li class="bold">
                        <a href="http://localhost/MIS347/html/opsteam/profile_opsteam.php" class="waves-effect waves-teal">Profile</a>
                    </li>
                    <li class="bold">
                        <a href="http://localhost/MIS347/html/opsteam/issueManagement_opsteam.php" class="waves-effect waves-teal">Issues</a>
                    </li>
                    <li class="bold">
                        <a href="http://localhost/MIS347/html/opsteam/groupManagement_opsteam.php" class="waves-effect waves-teal">Groups</a>
                    </li>
                    <li class="bold">
                        <a href="http://localhost/MIS347/html/opsteam/eventManagement_opsteam.php" class="waves-effect waves-teal">Events</a>
                    </li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="card">
            <form class="col s12 l12 m6">

                <div class="card-header">
                    <img src="../../media/profile_pic.png"/>
                </div>
                <div class="card-content">
                    <h5>User Name</h5>
                    <br/>
                    <h6>User Email</h6>
                    <h7>Active Status</h7>
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
