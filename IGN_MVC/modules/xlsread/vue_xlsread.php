<?php
require_once("include/vue_generique.php");
class VueXlsread extends VueGenerique {
	function __construct(){
		parent::__construct();
		$this->titre = "xlsread";
	}

	function afficheXls($entreprise) {
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
         $("#Export").click (function () {
            $("#tblReport").table2excel({
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
	  <body id="page"> <!-- -->

			<?php

//function lireAfficheExcel(){

		if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
		$xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
		$tailleFiche =  $xslObject -> getSheetCount();
		$nom = $xslObject ->getSheetNames();

		for ($index =0; $index <$tailleFiche; $index++) {

		$xslObject -> setActiveSheetIndex($index);
		$getSheet = $xslObject->getActiveSheet()->toArray(null);
		$_SESSION['tab'] = $getSheet;
		$taille =count($getSheet);
		//echo "<p>$taille</p>";
		$tableau = array_slice($getSheet,0,21);
		$first_names = array_column($tableau, 2);
		$position = count($first_names);

		?>
		<div class="container">

				<table id="tblReport">
					<?php
					$comp = 0;
					foreach ($tableau as $key) {
						$comp = $comp + 1;
						?>
						<tr>
							<?php
							$tab = array_slice($key,0,5);

							$i = 0;


						foreach ($tab as $cle => $value) {
								$i = $i +1;
								?>

								<td>
									<?php

									//for ($i=3; $i< $first_names ; $i++) {
										if(empty($value)){
												if($i != 1 && $i != 2 ){
														if($i == 3 && !($comp==2) && !($comp==7) && !($comp==8) && !($comp==14) && !($comp==15) && !($comp==18) && !($comp==19) ){
																?>
																<form class="" action="" method="post">
																	<SELECT class="list" name="choix[]" >
																			<OPTION value="1">1
																			<OPTION value="2">2
																			<OPTION value="4">4
																			<OPTION value="5">5
																	</SELECT>
															 <?php
														}



														else if($i == 4  && $comp!=2 && $comp != 7 && $comp != 8 && $comp != 14 && $comp != 15 && $comp != 18 && $comp != 19){
																?>

																	<input type="text" name="com[]" value="" placeholder="Commentaires" class="choix" id="val">

																<?php
														}elseif ($i==5 && $comp!=2 && $comp != 7 && $comp != 8 && $comp != 14 && $comp != 15 && $comp != 18 && $comp != 19) {
															?>
															<input type="text" name="quest[]" value="" placeholder="Question" class="choix" id="val">

															<?php
														}elseif ($i == 4 || $i == 5 && ($comp == 2 && $comp == 7 && $comp == 8 && $comp == 14 && $comp == 15 && $comp == 18 && $comp == 19)) {
															?>
																<input type="hidden" name="" >
																<?php
														}
														else{
															?>
																<input type="hidden" name="" value="" >
															<?php
														}
												}


								 }

									 echo $value;

								 ?>
								</td>

								<?php
						}

					}
					?>
					<input type="submit" name="" value="Enregistrer" id="Enregistrer">
					</form>
					<?php
				}



					 ?>
				 </tr>
				</table>
		</div>
		<?php

	}

?>
	    <div class="left">
				<?php


						 if (isset($tailleFiche)) {
							 ?>
							 <p class="nombrefiche">le nombre de feuille disponible <?php echo " <strong>($tailleFiche)</strong>" ?></p>
							 <p class="nomfiche"> <?php for ($i=0; $i <$tailleFiche ; $i++) {
								 echo "le nom de la feuille <strong>$i</strong> ".$nom[$i]."</br>";
							 }?></p>
							 <?php
						 }
				 ?>
				<ul id="menu-accordeon">
			 <li><a href="#">Liste des entreprises</a>
				<?php
				$i = 0;
					foreach ($entreprise as $valEn) {
						?>
			        <ul>
			           <li id="nomEn"><?php echo $valEn['Nom']; ?>
									 <li>
										 <form  class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
											 <input type="file" name= "xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
									 </form>
									 <button type="submit" name="button" id="Export">Télécharger au format Excel</button>
										</li>
								 </li>
			        </ul>
						<?php
					}
				 ?>
			 </li>
		 </ul>

		</div>
							<?php

									if (isset($_POST['choix']) && isset($_POST['com']) && isset($_POST['quest']) ) {

										$choix = $_POST['choix'];
										$com = $_POST['com'];
										$quest = $_POST['quest'];
										$comvid1 = $com[4];
										$comvid2 = $com[5];
										$questvid1 = $quest[4];
										$questvid2 = $quest[5];




										$newtab = array($choix,$com,$quest);


										?>
										<div class="container">
											<form class="" action="" method="post">
												<input type="submit" name="" value="tri" id="tri">
											</form>

										<table id="tblReport">
											<?php
											$z =0;
												$tableau = array_slice($_SESSION['tab'],0,21);
											foreach ($tableau as $key) {
												$z = $z +1;

												?>
												<tr>
													<?php

													$tab = array_slice($key,0,5);

													$i = 0;


												foreach ($tab as $cle => $value) {


														$i = $i +1;
														?>

														<td>
															<?php

															//for ($i=3; $i< $first_names ; $i++) {
																if(empty($value)){

																		if($i != 1 && $i != 2){
																				if($i == 3 && $z!=2 && $z!=7 && $z!=8 && $z!=15 && $z!=18 && $z!=19 ){
																					echo $choix[$z-3];

																				}
																				elseif ($i == 4 && $z!=2  && isset($com[$z])) {

																						echo $com[$z-3];

																					}

																				elseif($i == 5 && $z!=2  &&  isset($quest[$z])) {
																					echo $quest[$z-3];
																				}




																		}

																	?>


																 <?php

														 }

															 echo $value;

														 ?>
														</td>

														<?php
												}

											}
											?>
											</form>
											<?php
										}



											 ?>
										 </tr>
							</table>

							</div>
	  </body>
	</html>
	<?php
		}

	}
	 ?>
