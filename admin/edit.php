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

$images = glob('./images/models/'.$id.'/*');
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
		<div>
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#general" role="tab" data-toggle="tab">General</a>
			</li>
			<li role="presentation">
				<a href="#pictures" role="tab" data-toggle="tab">Gallery</a>
			</li>
			</ul>
		</div>
		<br/><br/>
		
			<div class="row">
				<form action="admin.php?action=edit&amp;id=<?php echo ($id + 1); ?>" method="post" class="col-md-9 col-xs-12">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="general">
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
						</div>
						<div role="tabpanel" class="tab-pane" id="pictures">
							<div class="form-group col-md-12 col-xs-12">
								<input type="file" name="model_image" class="">
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<ul>
								<?php
									foreach ($images as $index => $image):
										$imgname = basename($image);
								?>
									<li><a class="delete-image" title="Delete Image" href="admin.php?action=delete-image&amp;id=<?php echo ($id + 1); ?>&amp;image=<?php echo $imgname; ?>"><?php echo $imgname; ?></a></li>
								<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="form-group col-md-12 col-xs-12">
						<input type="hidden" name="update" value="1">
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="admin.php" class="btn btn-default pull-right">Cancel</a>
					</div>
				</form>
			</div> <!-- ./row -->
	</div> <!--./container -->
	<script type="text/javascript">
	
	$('a.delete-image').on('click', function(ev) {
		ev.preventDefault();
		var url = $(this).attr('href'), $a = $(this);
		if(!confirm('Are you sure?')) {
			return;
		}
		$.post(url, {}, function(response) {
			if(response == 'OK') {
				$a.parent().remove();
			} else {
				alert("Error: " + response);
			}
		});
	});
	</script>
</body>
</html>
