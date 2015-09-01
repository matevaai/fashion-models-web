<?php

echo "\nModel list";
echo "\n-----------";

$models = getModels('./data/models.json');
//print_r($models);

foreach ($models as $index => $model) {
	$counter = $index + 1;
  	echo "\n".$counter.". ".ucfirst($model["names"]["first"])." ".ucfirst($model["names"]["last"])." (".$model["age"].")"; 
}


