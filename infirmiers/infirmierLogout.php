<?php
session_start();
unset($_SESSION['infirmier']);

header("Location: infermierLogin.php");

?>