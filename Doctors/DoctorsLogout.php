<?php
session_start();
unset($_SESSION['doctor']);

header("Location: DoctorLogin.php");

?>