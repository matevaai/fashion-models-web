<?php 

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id === null) {
	die("Missing id");				
}
$id -= 1;

$models = getModels("./data/models.json");
$model = null;
foreach ($models as $key => $_model) {
	if ($key == $id){
		$model = $_model;
		break;
	}
}

if ($model === null) {
	die("Missing model");
}

if (isset($_POST["update"])) {
	$model = array(
		'names' => array('first' => $_POST['firstname'], 'last' => $_POST['lastname']),
		'age' => $_POST['age'],
		'height' => $_POST['height'],
		'chest' => $_POST['chest'],
		'waist' => $_POST['waist'],
	);
	$models[$id] = modelSanitize($model);
	var_dump($models[$id]); eixt;

	saveModels($models, './data/models.json');
	header('Location: /admin.php');
	exit;
}



?>
<html lang="en">
<?php $title = "Edit Model - Admin"; ?>
<?php include 'lib/head.php'; ?>
<body role="document">
	<?php include 'lib/nav.php'; ?>
    <div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Edit Model</h1>
		</div>

		<div class="row">
			<form action="admin.php?action=edit&amp;id=<?php echo ($id + 1); ?>" method="post" class="col-md-9 col-xs-12">
				<div class="form-group col-md-6 col-xs-12">
					<label for="firstname">First Name</label>
					<input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $model['names']['first']; ?>">
				</div>

				<div class="form-group col-md-6 col-xs-12">
					<label for="lastname">Last Name</label>
					<input class="form-control" type="text" name="lastname" value="<?php echo $model['names']['last']; ?>" id="lastname" placeholder="Last Name">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="age">Age</label>
					<input class="form-control" type="text" name="age" value="<?php echo $model['age']; ?>" id="age" placeholder="Age">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="height">Height</label>
					<input class="form-control" type="text" name="height" value="<?php echo $model['height']; ?>" id="height" placeholder="Height">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="chest">Bust</label>
					<input class="form-control" type="text" name="chest" value="<?php echo $model['chest']; ?>" id="chest" placeholder="Bust">
				</div>

				<div class="form-group col-md-3 col-xs-6">
					<label for="waist">Waist</label>
					<input class="form-control" type="text" name="waist" value="<?php echo $model['waist']; ?>" id="waist" placeholder="Waist">
				</div>

				<div class="form-group col-md-12 col-xs-12">
					<input type="hidden" name="update" value="1">
					<button type="submit" class="btn btn-primary">Update</button>
					<a href="admin.php" class="btn btn-default pull-right">Cancel</a>
				</div>
			</form>
		</div> <!-- ./row -->
	</div> <!--./container -->
</body>
</html>
