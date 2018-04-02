<!DOCTYPE html>
	<html>
	<head>
	<title>Accueil</title>
		<?php include('lien.php'); ?>
		</head>
		<body>
		<?php include('header.php');
			echo $module->getControleur()->getVue()->getContenu();
		?>
		<?php include('footer.php'); ?>
	</body>
	</html>