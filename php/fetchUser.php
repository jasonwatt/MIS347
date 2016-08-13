<?php
include('dbconnection.php');
if(isset($_POST['keysearch'])
{
    $search = $_POST['keysearch']);
    $data = mysql_query("SELECT * FROM users WHERE User_Name like '%$search%' order by id LIMIT 5");
    while($row = mysql_fetch_array($data))
    {
        $username   = $row['User_Name'];
        echo "<div class='show'><img src='' id='search' /><span class="name"><?php echo $username; ?></span></div>"
    }
}
?>
