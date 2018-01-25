<?php
session_start();
$_SESSION['active'] = 0;
header("Location: ../controller/C_catalog.php");