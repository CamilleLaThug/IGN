
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
    <title>grille xlsx</title>
  </head>
  <body> 
      <form class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
        <input type="file" name="xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
      </form>

      <?php

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
      # code...
    $xslObject -> setActiveSheetIndex($index);
    $getSheet = $xslObject->getActiveSheet()->toArray(null);
    $taille =count($getSheet);
    echo "<p>$taille</p>";
    var_dump($getSheet);
    $tableau = array_slice($getSheet,0,15);
    $reponse= array("val1");
   
var_dump($tableau);
    ?>
    <div class="container">
    	 <form method="post" action ="controle.php" >
        <table class="table">
          <?php

          foreach ($tableau as $key) {

            ?>
            <tr>
              <?php
              $tab = array_slice($key,0,5);
              $cpt=0;
            foreach ($tab as $cle => $value) {
                    
                ?>

                <td>
                  <?php

                  if(empty($value)){

                    ?>

                   <input type="text" name="reponse" />

                   <?php
                   $cpt++;
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
         <input type="submit" value="Valider" />
         
     </div>

    <?php

  }

   ?>

  </body>
</html>
