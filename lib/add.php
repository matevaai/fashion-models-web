<?php

echo "\nAdd new model";
echo "\n-------------";

$first_name = readline("First name");
$last_name = readline("Last name");
$age = readline("Age");
$height = readline("Height (cm)");
$chest = readline("Bust (cm)");
$waist = readline("Waist (cm)");

$entry = array(
	"names" => array("first" => trim($first_name), "last" => trim($last_name)),
	"height" => trim($height),
	"waist" => trim($waist),
	"chest" => trim($chest),
	"age" => trim($age)
);

$models = getModels('./data/models.json');
$index = getNextAutoIndex();
$models[$index] = $entry;

saveModels($models, './data/models.json');