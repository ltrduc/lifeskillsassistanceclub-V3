<?php
include '../lib/session.php';
include '../lib/database.php';
include '../helpers/format.php';
// Session::checkSession();

spl_autoload_register(function ($class) {
    include_once "../classes/" . $class . ".php";
});
 
$db                 = new Database();
$fm                 = new Format();
$Dashboard          = new Dashboard();
$Personnel          = new Personnel();
$Executive          = new Executive();
$Position           = new Position();
$Team               = new Team();
$Decentralization   = new Decentralization();
?>