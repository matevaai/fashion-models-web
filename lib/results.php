<?php

echo "\nLast competition results";

$results = getModelsVotes("./data/model_votes.json");
$models = getModels('./data/models.json');

$counter = 1;
arsort($results, SORT_NUMERIC);

foreach ($results as $id => $vote) {
	$model = $models[$id];
	$names = $model['names']['first']." ".$model['names']['last'];
	echo "\n".$counter.". ".$names.": ".$vote;
	$counter++;	
}




//print_r($results);
//print_r($models);

