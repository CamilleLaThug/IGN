<!DOCTYPE html>
<html lang="en">

<head>

		<?php include('lien.php'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion Admin</title>



</head>
		<body>

		<?php include('header.php');
			echo $module->getControleur()->getVue()->getContenu();

		?>


	
	</body>
	</html>