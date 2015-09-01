<?php

$number = readline("Please enter the number of model you want to view");
$models = getModels('./data/models.json');
//print_r($models);

$index = (int) $number - 1;
//echo $index;
if (!isset($models[$index])) {
	die("\nCan not find the model with number $number");
}

$model = $models[$index];
//print_r($model);
echo "\nNames: ".ucfirst($model["names"]["first"])." ".ucfirst($model["names"]["last"]);
echo "\nAge: ".$model["age"];
echo "\nHeight: ".$model["height"];
echo "\nBust: ".$model["chest"];
echo "\nWaist: ".$model["waist"];
