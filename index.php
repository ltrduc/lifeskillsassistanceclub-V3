<?php
	$uri = (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) ? 'https://' : 'http://';
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/admin/');
	exit;
?>
