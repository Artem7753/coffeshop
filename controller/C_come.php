<?php
session_start();
include_once( '../models/function.php' );
$controller = new Base();
$controller->ConnectCSS();
$controller->TwigLoad('come.tmpl',[],'../templates');
