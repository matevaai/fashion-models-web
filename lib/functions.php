<?php

if(!function_exists('readline')) {
	function readline($label)
	{
		echo "\n".$label.': ';
		return stream_get_line(STDIN, 1024, PHP_EOL);
	}		
}


function getModels($path) 
{
	if (!file_exists($path)) {
		echo "\n$path does not exist!";
		return false;
	}

	$file = file_get_contents($path);
	$models = json_decode($file, true);

	if (empty($models)) {
		return array();
	}

	return $models;
}

function saveModels($models, $path)
{
	$json = json_encode($models);
	if (file_put_contents($path, $json) === false) {
		echo "\n Error while saving data";
		return false;
	} else {
		echo "\nData successfully saved";
		return true;
	}
}

function getNextAutoIndex()
{
	$path = "./data/autoindex";
	$current_auto_index = (int) file_get_contents($path);
	$new_auto_index = $current_auto_index + 1;

	if (file_put_contents($path, $new_auto_index) === false) {
		echo "\n Error while saving next auto index";
	} 
	return $current_auto_index;
}


function actionEditSave($models, $index)
{
	if (!isset($models[$index])) {
		die("\nCan not find the model with number $number");
	}
	$model = $models[$index]; 

	$result = actionEditprompt($model);
	$field =  $result["field"];
	$value = $result["value"];

	switch ($field) {
		case '1':
			$model["names"]["first"] = $value;
			break;
		
		case '2':
			$model["names"]["last"] = $value;
			break;
		
		case '3':
			$model["age"] = $value;
			break;

		case '4':
			$model["height"] = $value;
			break;

		case '5':
			$model["waist"] = $value;
			break;

		case '6':
			$model["chest"] = $value;
			break;

		case 'q':
			return true;
			break;

		default:
			return false;
			break;
	}
	$models[$index] = $model;

	saveModels($models, './data/models.json');
	return false;
}

function actionEditprompt($model) 
{
	echo "\nEditing ".ucfirst($model["names"]["first"])." ".ucfirst($model["names"]["last"]).": ";

	echo "\n1. First name: ".ucfirst($model["names"]["first"]);
	echo "\n2. Last name: ".ucfirst($model["names"]["last"]);
	echo "\n3. Age: ".$model["age"];
	echo "\n4. Height: ".$model["height"];
	echo "\n5. Waist: ".$model["waist"];
	echo "\n6. Chest: ".$model["chest"];

	$field = readline("Please enter a number of the field you want to edit or 'q' to leave");
	if ($field != 'q') {
		$value = readline("New value");
	} else {
		$value = '';
	}
	return array("field" => $field, "value" => $value);
}

function saveModelVotes($votes, $path)
{
	$json = json_encode($votes);
	if (file_put_contents($path, $json) === false) {
		echo "\n Error while saving data";
		return false;
	} else {
		echo "\nModel votes successfully saved";
		return true;
	}
}

function getModelsVotes($path) 
{
	if (!file_exists($path)) {
		echo "\n$path does not exist!";
		return false;
	}

	$file = file_get_contents($path);
	$votes = json_decode($file, true);

	if (empty($votes)) {
		return array();
	}

	return $votes;
}