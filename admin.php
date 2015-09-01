<?php
include("./lib/functions.php");

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
	case 'edit':
	case 'new':
		include('./admin/new.php'); 
		break;
	case 'delete':
		include('./admin/delete.php');
		break;
	
	case 'list':
	default:			
		include('./admin/list.php');
		break;
	
}