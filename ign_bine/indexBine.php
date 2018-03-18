
<?php
require_once 'Classes\PHPExcel\IOFactory.php';
include 'Classes\PHPExcel\Writer\Excel2007.php';
/*header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
           header("Content-Disposition: attachment;filename=\"filename.xlsx\"");
          header("Cache-Control: max-age=0");

          ini_set('include_path', ini_get('include_path').';../Classes/');
*/
        

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
  <body> <!-- -->
      <form class="grille" action="" method="post" enctype="multipart/form-data" id="from_file">
        <input type="file" name="xslFille" value="Excel" onchange="document.getElementById('from_file').submit()" id="fichier">
      </form>

      <?php
//function lireAfficheExcel(){
          $FileExcel = new PHPExcel();
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

    $tableau = array_slice($getSheet,0,15);
    ?>
    <div class="container">

        <table class="table">
          <?php
          $fp = fopen("export.csv", "w");
          foreach ($tableau as $key) {

            ?>
            <tr>
              <?php
              $tab = array_slice($key,0,5);
            foreach ($tab as $cle => $value) {

                ?>

                <td>
                  <?php

                  if(empty($value)){
                    ?>

                   <input type="text" name="" value="">

                   <?php
                 }
                fputcsv($fp, $tab);
                echo $value;

                 ?>
                </td>

                <?php
            }
          }
        }
        //fclose($fp);

          /*Générer un fichier excel à télécharger*/
          $objWriter = new PHPExcel_Writer_Excel2007($FileExcel);
          /*$records = '/opt/lampp/htdocs/www/file_testbis.xlsx';
          $objWriter->save($records);*/

          $objReader = PHPExcel_IOFactory::createReader('CSV');
          //$objReader->setDelimiter("\t");

          $objPHPExcel = $objReader->load('export.csv');
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          /*Mettre le chemin correspondant pour le $records*/
          //$records = 'local_html/S04/';
          //$objWriter->save($records);
          /*
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="test.xlsx"');
          header('Cache-Control: max-age=0');
          */
          /*force user to download the Excel file*/
         // $objWriter->save('php://output');
          exit();
          ?>
         </tr>
        </table>
    </div>

    <?php

  }

//}
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
