<html lang="en">
<?php $title = "List - Admin"; ?>
<?php include 'lib/head.php'; ?>
<body role="document">
	<?php include 'lib/nav.php'; ?>

    <div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Model List</h1>
		</div>

		<div class="row">
			<div class="col-md-12">
				<ul>
					<?php 
						$models = getModels('data/models.json');
						foreach ($models as $index => $model) {
							echo '<li>'.$model['names']['first'].' '.$model['names']['last'].', '.$model['age'];
							echo '&nbsp;<a href="admin.php?action=edit&id='.($index+1).'">edit</a>';
							echo '&nbsp;<a href="admin.php?action=delete&id='.($index+1).'">delete</a>';
							echo '</li>';
						}
					?>
				</ul>
			</div>
		</div> <!-- ./row -->
	</div> <!--./container -->
</body>
</html>