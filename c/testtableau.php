<?php 
  require_once '../Classes/PHPExcel/IOFactory.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Grille de Synthèse</title>
    <h2 class="title">Grille de synthèse</h2>

<?php /* _____________________________________________________________*/ ?>   
	<form class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
    	<input type="file" name="xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
    </form> 
<?php 
if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
    $xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
    $tailleFiche =  $xslObject -> getSheetCount();
    $nom = $xslObject ->getSheetNames();

    for ($index =0; $index <$tailleFiche; $index++) {

	    $xslObject -> setActiveSheetIndex($index);
	    $getSheet = $xslObject->getActiveSheet()->toArray(null);
	    $taille =count($getSheet);
	}
	$tableau = $getSheet;
	foreach ($tableau as $key) {
		foreach ($key as $cle => $value) {
			if(empty($value)){
				$nb=1;
				$key[$cle]= $nb;
				$nb++;	var_dump($nb);
			}	
		}
		//var_dump($key);
	}?> <br> <?php
	
}

?>
<?php
//var_dump($tableau);
$resultat = array(array("société", ""), array("titre"), array("Résumé"), array("Numérotation"), array("Thématique"), array("Synthèse FL"), array("notateur technique"), array("<strong>Tableau technique</strong>"/* tableau a recup */), array("Total individuel"),array("Note moyenne IGNfab"), array("Note moyenne partenaires"), array("Moyenne notes techniques (IGN + partenaires"),array("Classement technique"), array("plus haute - plus basse"), array("notateur marché"), array("<strong>Tableau marché Evaluation société</strong>"/* tableau a recup SHEET 1 */), array("notateur aspect Marché" /* SHEET 2 */), array("<strong>Tableau Eval commerciale</strong>"),array("score total"), array("Moyenne CAP + IGN"), array("Moyenne PARTENAIRE"), array("Moyenne TOTAL"), array("Classement société"), array("Classment Technique"), array("Classment des Notes Techniques"), array("société" /* Meme que premier tab*/));

/*Calcul de la somme des notes à faire*/
?>
	</head>
		<body>
			<div class="container">
<?php //function createTab($resultat){} ?>
				<table class="table">
					<?php 
					foreach ($resultat as $key) {
						?>
						<tr>
						<?php 
						foreach ($key as $cle => $value) {
							?> 
							<td>
							<?php 
							echo $value;
							?> 
							</td>
							<?php
						}
					}
					?> 
						</tr>
				</table>
			</div>
		</body>
</html>
