<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	die('Access denied - wrong request method. POST only allowed.');
}

if(!isset($_GET['id'])) {
	die("Missing model id.");
}

if(!isset($_GET['image'])) {
	die('Missing image index.');
}
$id = (int) $_GET['id'] - 1;
$name = preg_match('/^([\d]+|default)\.jpg$/i', $_GET['image']) ? $_GET['image'] : false;
$image = './images/models/'.$id.'/'.$name;

if (!$image || !file_exists($image)) {
	die('File not found: '.$image);
}

// unlink($image);
echo 'OK';