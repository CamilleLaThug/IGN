
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
      # code...
    $xslObject -> setActiveSheetIndex($index);
    $getSheet = $xslObject->getActiveSheet()->toArray(null);
    $taille =count($getSheet);
    //echo "<p>$taille</p>";

    $tableau = array_slice($getSheet,0,15);
    ?>
    <div class="container">

        <table class="table">
          <?php
          foreach ($tableau as $key) {

            ?>
            <tr>
              <?php

              $tab = array_slice($key,0,5);
            foreach ($tab as $cle => $value) {
              $key2 = array_values($tab);

                ?>

                <td>
                  <?php


                  if(empty($key2)){
                    ?>

                   <input type="text" name="" value="">

                   <?php
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

    <?php

  }

    ?>

<!--
   <div class="bloc1" >
      <li> <a href="" class="lien">Entreptise 1</a> </li>
      <li> <a href="" class="lien">Entreptise 2</a> </li>
      <li> <a href="" class="lien">Entreptise 3</a> </li>
      <li> <a href="" class="lien">Entreptise 4</a> </li>
   </div>
-->
  </body>
</html>
