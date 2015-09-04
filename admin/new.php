<?php 

if (isset($_POST["new"])) {
	$model = array(
		'names' => array('first' => $_POST['firstname'], 'last' => $_POST['lastname']),
		'age' => $_POST['age'],
		'height' => $_POST['height'],
		'chest' => $_POST['chest'],
		'waist' => $_POST['waist'],
	);
	$models = getModels('./data/models.json');
	$index = getNextAutoIndex();
	$models[$index] = modelSanitize($model);

	saveModels($models, './data/models.json');
	header('Location: /admin.php');
	exit;
}
?>
<html lang="en">
<?php $title = "New Model - Admin"; ?>
<?php include 'lib/head.php'; ?>
<body role="document">
	<?php include 'lib/nav.php'; ?>

    <div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>New Model</h1>
		</div>

		<div class="row">
			<form action="admin.php?action=new" method="post" class="col-md-9 col-xs-12">
				<div class="form-group col-md-6 col-xs-12">
					<label for="firstname">First Name</label>
					<input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name">
				</div>

				<div class="form-group col-md-6 col-xs-12">
					<label for="lastname">Last Name</label>
					<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="age">Age</label>
					<input class="form-control" type="text" name="age" id="age" placeholder="Age">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="height">Height</label>
					<input class="form-control" type="text" name="height" id="height" placeholder="Height">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="chest">Bust</label>
					<input class="form-control" type="text" name="chest" id="chest" placeholder="Bust">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="waist">Waist</label>
					<input class="form-control" type="text" name="waist" id="waist" placeholder="Waist">
				</div>

				<div class="form-group col-md-12 col-xs-12">
					<input type="hidden" name="new" value="1">
					<button type="submit" class="btn btn-primary">Create</button>
					<a href="admin.php" class="btn btn-default pull-right">Cancel</a>
				</div>
			</form>
		</div> <!-- ./row -->
	</div> <!--./container -->
</body>
</html>
