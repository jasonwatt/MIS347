<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/admin/userManagement_admin.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../../angular.min.js"></script>
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>



    <ul id="nav-mobile" class="side-nav fixed sideNav">
        <br>
        <br>
        <li class="bold"><a href="profile_admin.php" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="issueManagement_admin.php" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="groupManagement_admin.php" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="eventManagement_admin.php" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">

            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Admin</a>
                    <a href="#!" class="breadcrumb">User Management</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="sass.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn">Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Users</h4>
        </div>

        <div id="fab_add">
            <a class="btn-floating btn-large waves-effect waves-light red right fab_add"><i class="material-icons">add</i></a>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6" ng-app="">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Last Active</th>
                            <th data-field="price">Groups</th>
                            <th data-field="action"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        define('DB_NAME', 'skecomplaints');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints'); 
                        if(! $conn)
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }


                            $sql = "SELECT * FROM user";
                            $result = $conn->query($sql);

                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                //Creates a loop to loop through results
                                $User_ID = $row["User_ID"];
                                $Username = $row["Username"];
                                $Event_ID = $row["Event_ID"];
                                $Group_ID = $row["Group_ID"];
                                $Email = $row["Email"];
                                $Password = $row["Password"];
                                $Status = $row["Status"];
                                $User_Name = $row["User_Name"];
                                $User_Type = $row["User_Type"];
                                $Last_Active = $row["Last_Active"];

                                echo '
                                <tr id="'.$User_ID.'">
                                    <form  id="deluser" action = "../../php/del.php" method = "post">
                                        <input name="userid" type = "hidden" value = "'.$User_ID.'" />
                                    </form>
                                    <td>'.$User_Name.'</td>
                                    <td>'.$Last_Active.'</td>
                                    <td>'.$Group_ID.'</td>
                                    <td>
                                        <a class="btn-floating modal-trigger btn-small waves-effect waves-light blue btn_delete" href="#deleteIssuerModal"><i class="material-icons">delete</i></a>
                                        <a class="btn-floating btn-small waves-effect waves-light red btn_edit"><i class="material-icons">mode_edit</i></a>
                                    </td>
                                </tr>
                                '; // echo end

                            }

                        ?>
                        <!-- <tr>
                            <td>Hector</td>
                            <td>MM/DD/YY</td>
                            <td>Group 1,..3 more</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Alexander</td>
                            <td>MM/DD/YY</td>
                            <td>Group 2</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Oliver</td>
                            <td>MM/DD/YY</td>
                            <td>Group 15,..7 more</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>

            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>

    <div id="deleteIssuerModal" class="modal deleteModal">
       <div class="modal-content">
         <h4>Delete User</h4>
       </div>
       <div class="modal-footer">
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id = "deleteIssueConfirmButton">Confirm</a>
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat cancelButton">Cancel</a>
       </div>
     </div>

    <script>
        $(document).ready(function() {
            $('select').material_select();
            $('.modal-trigger').leanModal();
        });
    </script>

    <script>
        $("#deleteIssueConfirmButton").click(function(){
            $("#deluser").submit();
        });
    </script>
</body>

</html>
