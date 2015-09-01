<?php

$purge = readline('Are you sure you want to purge all data (yes/no)');

if ($purge != "yes") {
	die("\nNot confirmed, aborting ...");
}

saveModelVotes(array(), "./data/model_votes.json");
saveModels(array(), "./data/models.json");

file_put_contents("./data/autoindex", 0);

echo "\nData was successfully purged.";