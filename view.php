<html lang="en">
<?php $title = "Model Profile"; ?>
<?php include 'lib/head.php'; ?>
  <body role="document">

	<?php include 'lib/nav.php'; ?>
	<?php 
		require('./vendor/autoload.php');

		include('./lib/functions.php');
		$models = getModels('./data/models.json');
		if (!isset($_GET["id"])) {
			die("Missing data");
		}

		$id = $_GET["id"] - 1;
		$model = array();
		if (isset($models[$id])) {
			$model = $models[$id];
		}
		if (empty($model)) {
			die("Can not find model.");
		}
		$names = $model['names']['first']." ".$model['names']['last'];
		$thumbnail = './temp/view-defaults/'.$id.'.jpg';
		if(!file_exists($thumbnail)) {
			try {
				$img = new abeautifulsite\SimpleImage('images/models/'.$id.'/default.jpg');
				$img->thumbnail(300, 450)->save($thumbnail);
			} catch (\Exception $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
	?>

	<div class="container theme-showcase" role="main">

        <div class="page-header">
      	  <h1><?php echo $names; ?></h1>
        </div>
        <div class="row">
		<div class="col-sm-4 col-xs-12">
			<a href="images/models/<?php echo $id; ?>/default.jpg">
				<img class="img-responsive" src="<?php echo $thumbnail; ?>">
			</a>
		</div> 
		<div class="col-sm-8 col-xs-12"> 	
			<p>
				Age: <?php echo $model['age']; ?><br />
				Height: <?php echo $model['height']; ?><br />
				Bust: <?php echo $model['chest']; ?><br />
				Waist: <?php echo $model['waist']; ?><br />
			</p> 

			<?php
				$images = glob('./images/models/'.$id.'/*');
				//print_r($images);
				foreach ($images as $image):
					if (strpos($image, "default.jpg") !== false) {
						continue;
					}
					
					$thumbnail = './temp/view-gallery/'.basename($image);
					if(!file_exists($thumbnail)) {
						try {
							$img = new abeautifulsite\SimpleImage($image);
							
							$img->thumbnail(150, 200)->save($thumbnail);
						} catch (\Exception $e) {
							echo '<p class="bg-danger">'.$e->getMessage().'</p>';
							$thumbnail = '';
						}
					}
			?>
				<div class="col-sm-3">
					<a href="<?php echo $image; ?>"><img src="<?php echo $thumbnail; ?>" class="img-responsive"></a>
				</div>
			<?php 
				endforeach;
			?>

		</div>
		</div>

	</div>
</body>
</html>