<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/partials/header.php');
require_once($filepath . '/partials/sidebar.php');
require_once($filepath . '/pages/' . $data['page'] . '.php');
require_once($filepath . '/partials/footer.php');
?>
