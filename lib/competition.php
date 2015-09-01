<?php

$models = getModels('./data/models.json');
$model_votes = array();

foreach ($models as $id => $model) {
	$model_votes[$id] = rand(1, 10);
}
//print_r($model_votes);

saveModelVotes($model_votes, "./data/model_votes.json");