<?php
include("./lib/functions.php");
$currentPage = "admin";

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
	case 'edit':
		include('./admin/edit.php');
		break;
		
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