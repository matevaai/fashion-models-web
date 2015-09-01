<!DOCTYPE html>
<html lang="en">
<?php $title = "Models Index"; ?>
<?php require('./vendor/autoload.php'); ?>
<?php include 'lib/head.php'; ?>

  <body role="document">

  	<?php include 'lib/nav.php'; ?>

    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h1>Models</h1>
      </div>
      <?php
      	include('./lib/functions.php');
      	$models = getModels('./data/models.json');
      ?>
      <div class="row">
      	<?php
      	foreach ($models as $id => $model):
      		$name = $model['names']['first']." ".$model['names']['last'];
          $image = 'images/models/'.$id.'/default.jpg';
          $thumbnail = './temp/index-defaults/'.$id.'.jpg';
          if(!file_exists($thumbnail)) {
              try {
                $img = new abeautifulsite\SimpleImage($image);
                $img->thumbnail(300, 450)->save($thumbnail);
              } catch (\Exception $e) {
                echo '<p class="bg-danger">'.$e->getMessage().'</p>';
                $thumbnail = '';
              } 
          }
      	?>
      	<div class="col-md-4">
      		<h3><?php echo $name; ?></h3>
      		<a href="view.php?id=<?php echo $id + 1; ?>" ><img src="<?php echo $thumbnail; ?>" class="img-responsive"></a>
      	</div>
      <?php endforeach; ?>

      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
