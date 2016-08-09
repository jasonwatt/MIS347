<?php
session_start();
session_destroy();
header("Location: http://localhost:1234/AmDrex/html/shared/login.html");
?>