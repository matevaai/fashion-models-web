<?php
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id === null) {
	die("Missing id!");
}
$id -= 1;

$models = getModels("./data/models.json");
$model = null;
foreach ($models as $key => $_model) {
	if ($key == $id) {
		$model = $_model;
		break;
	}
}

if ($model === null) {
	die("Model not found");
}

$submitted = false;
if (isset($_POST["confirm"])) {
	$votes = getModelsVotes("./data/model_votes.json");

	unset($models[$id]);
	unset($votes[$id]);

	// FIXME delete model pics and temp files!!!

	saveModels($models, './data/models.json');
	saveModelVotes($votes, "./data/model_votes.json");
	$submitted = true;
}
?>
<html lang="en">
<?php $title = "Delete Model - Admin"; ?>
<?php include 'lib/head.php'; ?>
<body role="document">
	<?php include 'lib/nav.php'; ?>

    <div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Delete Model</h1>
		</div>

		<div class="row">
			<div class="col-md-12">
				<?php if (!$submitted): ?>
				<form action="admin.php?action=delete&amp;id=<?php echo ($id + 1); ?>" method="post">
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Warning!</strong> Are you sure you want to delete 
						<?php echo $model['names']['first']." ".$model['names']['last']; ?>?
					</div>
					<input type="hidden" name="confirm" value="1">
					<button type="submit" class="btn btn-danger">Delete</button>
					<a href="admin.php" class="btn btn-default">Cancel</a>
				</form>
				<?php else: ?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success!</strong> <?php echo $model['names']['first']." ".$model['names']['last']; ?>
						was deleted. 
					</div>
					<a href="admin.php" class="btn btn-default">Back to the list</a>
				<?php endif; ?>
			</div>
		</div> <!-- ./row -->
	</div> <!--./container -->
</body>
</html>