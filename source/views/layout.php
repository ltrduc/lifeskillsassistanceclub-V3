<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/views/partials/header.php');
require_once($filepath . '/views/partials/sidebar.php');
require_once($filepath . '/views/pages/' . $data['page'] . '.php');
require_once($filepath . '/views/partials/footer.php');
?>
