
<?php
  require_once 'Classes/PHPExcel/IOFactory.php';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-table2excel-master\dist\jquery.table2excel.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e){
        $("#btn").click(function(e){
            $(".table").table2excel({
              name :"recap",
              filename :"recap",
              fileext:".xls"
            });
        });
    });

var data_to_send = $.serialize(getSheet);

$.ajax({
    type: "POST",
    url: "index.php",
    data: data_to_send,
    success: function(msg){
        $('.table').html(msg);
    }
});
  </script>
  <title>grille xlsx</title>
  </head>
  <body> <!-- -->
      <form class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
        <input type="file" name="xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
        <button type="button" name="button" id="btn">Télécharger au format Excel</button>
      </form>

      <?php
//function lireAfficheExcel(){
    $phpExcel = new PHPExcel();

    if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
    	$xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
    	$tailleFiche =  $xslObject -> getSheetCount();
    	$nom = $xslObject ->getSheetNames();
    ?>


    <p class="nombrefiche">le nombre de feuille disponible <?php echo " <strong>$tailleFiche</strong>" ?></p>
    <p class="nomfiche"> <?php for ($i=0; $i <$tailleFiche ; $i++) {
      echo "le nom de la feuille <strong>$i</strong> ".$nom[$i]."</br>";
    }?></p>


    <?php
    for ($index =0; $index <$tailleFiche; $index++) {

    	$xslObject -> setActiveSheetIndex($index);
    	$getSheet = $xslObject->getActiveSheet()->toArray(null);
    	$tab = array();

    /**** RECUPERE LE PREMIERE LIGNE DU TABLEAU ***/

    $tab[0] = $getSheet[1];
   // var_dump($tab);
    /***********************************/


    /**************************************

      $findme   = 'Titre_';
				  $pos = strpos($i, $findme);
				  if (empty($value)&&$pos==true){
				  	$i+1="YES";
				  }*/

    $taille =count($getSheet);
    //echo "<p>$taille</p>";

    $tableau = array_slice($getSheet,0,15);
    $first_names = array_column($tableau, 2);
    $position = count($first_names);

    
    
    // echo substr_compare("abcde", "bc", 1, 2); // 0
    // $comparaison=substr_compare("Titre_theme1", "Titre_", 0, 5);
    // echo $comparaison;


    ?>
    <div class="container">

        <table class="table">
          <?php
          foreach ($tableau as $key) {

            ?>
            <tr>
              <?php
              
           //   var_dump($key);
              $subtab = array_slice($key,0,5);

              $i = 0;

              // foreach ($tab as $cle => $value) {
              // var_dump($subtab);
            foreach ($subtab as $cle => $value) {
                $i = $i +1;
                ?>



                <td>
                
                
	                  <?php

	               if($cle==0 && (substr_compare($value, "Titre_", 0,5 )==0)){
                  		$replace= "<select><option>SommeDesNotes</option></select>" ;
                     // $value=$replace;
                      $subtab[$cle+1][1]=$replace;
                    
                     // echo $value;
								      // print_r($tab);
								     
					}
       		
          			
          foreach ($subtab as $cle => $value) {
    echo $value;

  }   
                   

                 ?>
                </td>

                <?php
            }



          }
        }

 // var_dump($subtab); 

           ?>
         </tr>
        </table>
    </div>
    <?php

  }


    ?>


  </body>
</html>
