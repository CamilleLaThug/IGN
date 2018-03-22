<?php 
  require_once 'Classes/PHPExcel/IOFactory.php';
?>



<?php

$NotationColonne=array("1","2","3");
$Titre=array("titre1","titre2","titre3");
$Résumé=array("resume1");

$tableau = array (
    "Notation colonne"  => $NotationColonne,
    "Titre" => $Titre,
    "Résumé"  => $Résumé
);


print_r($tableau);
var_dump($tableau);
?>


<table border ="1">
	<?php
		for ($i = 1; $i <= 2; $i++){
	
?>

	<tr>
		<?php
	for ($j = 1; $j <= 3; $j++) {
		?>

	<td> <?php 
		echo "oui"; ?> 
	</td>
		<?php
	}
		?>
	</tr>
<?php
}
?>