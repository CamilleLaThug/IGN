
<?php
  //require_once 'Classes\PHPExcel\IOFactory.php';
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



    $tab[0] = $getSheet[1];

    $taille =count($getSheet);


    $tableau = array_slice($getSheet,0,15);
    $first_names = array_column($tableau, 2);
    $position = count($first_names);


    ?>
    <div class="container">

        <table class="table">
          <?php

          $note = array();
          $note[0]=array();
           $note[1]=array();
        

          foreach ($tableau as $key) {

            ?>
            <tr>
              <?php

              $tab = array_slice($key,0,5);

              $i = 0;

              // foreach ($tab as $cle => $value) {
              
            foreach ($tab as $cle => $value) {
                $i = $i +1;
                ?>

                <td>
                
                  <?php


                  	if(in_array($value, $tableau[0])&&($value!=NULL)){
                  		array_push($note[0], $value);
                  	}
                  	if(in_array($value, $tableau[1])&&is_float($value)&&($value!=NULL)){
                  		array_push($note[1], $value);
                  	}
                  

                
          			echo $value;
  
                 ?>
                </td>

                <?php
            }
          }
        }

           ?>
         </tr>
        </table>
    </div>


<!-- TABLEAU MERGANT LA SOMME DES NOTES DE LA GRILLE DU DESSUS-->
       <div>
        <table>
        	<tr>
        	<?php

        		foreach ($note as $key) {
        		 $vari = array_slice($key,0,10);
        	?>
        	<?php
        		foreach ($vari as $cle => $value) {
              ?>
            <td>
            <?php 
        			echo $value;
        	?>
        		</td>
            <?php 
          		}
             ?>
        	</tr>
        			<?php       		
        		}
        	?>
        </table>
    </div>
    <?php




  }

    ?>

  


  </body>
</html>

