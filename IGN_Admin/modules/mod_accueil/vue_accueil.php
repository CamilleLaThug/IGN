<?php

require_once('./include/vue_generique.php');

class VueAccueil extends VueGenerique{

	function __construct(){
		parent::__construct();
		$this->titre = "xls";
	}

	function affiche(){
		require_once 'Classes/PHPExcel/IOFactory.php';

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="modules/xlsread/style.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="http://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$("#download").click (function () {
						$("#table").table2excel({ 
							exclude: ".noExl",
							name: "Results",
							filename: "Total Cost Analysis Report",
							fileext: ".xls",
						});
					});
				});


			</script>
			<title>grille xlsx</title>
		</head>
		<body id="page">
			<div class="left" style="width: 100px;">
				<ul id="menu-accordeon">
					<li><a href="#">Liste des entreprises</a>
						<ul>
							<li><a href="index.php?module=accueil&action=xlsread">Entreprise 1</a></li>
							<li><a href="index.php?module=accueil&action=xlsread">Entreprise 2</a></li>
							<li><a href="index.php?module=accueil&action=xlsread">Entreprise 3</a></li>
							<li><a href="index.php?module=accueil&action=xlsread">Entreprise 4</a></li>
						</ul>
					</li>
				</ul>
			</div>

			<?php
		}
		function afficheFiche(){
			$this->affiche();
			require_once 'Classes/PHPExcel/IOFactory.php';

			?>
			<div id="menu-accordeon">
				<ul>
					<li><a href="#">Téléchargement du fichier Excel</a>
						<ul>
							<li>
								<form  class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
									<input type="file" name="xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
								</form>
							</li>
							<li><button type="button" name="button" id="download">Télécharger au format Excel</button></li>
						</ul>
					</li>
				</ul>
			</div>

			<?php

  //function lireAfficheExcel(){
			$phpExcel = new PHPExcel();

			if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
				$xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
				$tailleFiche =  $xslObject -> getSheetCount();
				$nom = $xslObject ->getSheetNames();
				?>
				<div class="left" style="margin-top: 200px;">
					<p class="nombrefiche">le nombre de feuille disponible <?php echo $tailleFiche ?></p>
					<p class="nomfiche"> <?php for ($i=0; $i <$tailleFiche ; $i++) {
						echo "le nom de la feuille $i ".$nom[$i]."</br>";
					}?></p>
				</div>
				<?php
    //for ($index =0; $index <$tailleFiche; $index++) {

				$xslObject -> setActiveSheetIndex(1);
				$getSheet = $xslObject->getActiveSheet()->toArray(null);
				$tab = array();
				$tab[1] = $getSheet[0];
				$tab[0] = $getSheet[1];
				unset($getSheet[0]);
				unset($getSheet[1]);
				array_multisort(array_column($getSheet,15),SORT_DESC,SORT_NUMERIC,$getSheet);
				$taille =count($getSheet);
				?>
				<div class="container">
					<table class="table" id="table">
						<?php
						$tab = array_filter($tab);
						foreach ($tab as $key) {
							?>
							<tr>
								<?php
								if($key!=null && is_array($key)){
									$tab2 = array_filter($key);
								}else{
									$tab2 = array();
								}
								if(is_array($key)){
									foreach($tab2 as $cle => $value) {
										?>
										<td>
											<?php echo $value; ?>
										</td>
										<?php
									}
								}else{
									?>
									<td>
										<?php echo $key; ?>
									</td>
									<?php
								}
							}
							?>
						</tr>
						<?php
						foreach ($getSheet as $key) {
							?>
							<tr>
								<?php
								$key2= array_filter($key);
								foreach ($key2 as $cle => $value) {
									?>
									<td>
										<?php echo $value; ?>
									</td>

									<?php
								}
							}
							?>
						</tr>
					</table>
				</div>
				<?php
			}
			?>
		</body>
		</html>
		<?php
	}
}
?>