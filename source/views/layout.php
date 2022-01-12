<?php
include './source/core/lib/session.php';
Session::checkSession();
?>
<?php include('./source/views/partials/header.php'); ?>
<?php include('./source/views/partials/sidebar.php'); ?>
<?php require_once("./source/views/pages/" . $data["page"] . ".php"); ?>
<?php include('./source/views/partials/footer.php'); ?>
