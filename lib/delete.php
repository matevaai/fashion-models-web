<?php 

$number = readline("Please enter the number of model you want to delete");
$models = getModels('./data/models.json');
$votes = getModelsVotes("./data/model_votes.json");

$index = (int) $number - 1;
if (!isset($models[$index])) {
	die("\nCan not find the model with number $number");
}

unset($models[$index]);
unset($votes[$index]);
//print_r($models);

echo "\nModel $number successfully deleted.";
saveModels($models, './data/models.json');
saveModelVotes($votes, "./data/model_votes.json");