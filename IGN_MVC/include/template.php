<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<title><?php echo $afficheModule->getControleur()->getVue()->getTitre();?></title>
		<link rel="stylesheet" type="text/css" href="include/index.css">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>

		<section>

		<?php
		echo $afficheModule->getControleur()->getVue()->getContenu();
		?>

		</section>

	</body>

	<?php include("footer.php"); ?>

</html>
