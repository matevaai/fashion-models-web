<?php

$number = readline("Please enter the number of model you want to edit");
$index = (int) $number - 1;

do {
	$models = getModels('./data/models.json');
	
	$check = actionEditSave($models, $index);
} while ($check === false);

$i = 0;
while ($i < 10) {
	echo "\n$i";
	$i++;
}
