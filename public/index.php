<?php

session_start();

$availableRoutes = [
	'homepage', 'page_dpe', 'infos_dpe'
];

$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
	$route = $_GET['page'];
}

require  ('../src/views/layout.php');