
<?php
  require_once '/home/etudiants/info/skaplan/local_html/IGN/Classes/PHPExcel/IOFactory.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
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
  if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
    $xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
    $tailleFiche =  $xslObject -> getSheetCount();
    $nom = $xslObject ->getSheetNames();
    ?>
    <p class="nombrefiche">le nombre de feuille disponible <?php echo $tailleFiche ?></p>
    <p class="nomfiche"> <?php for ($i=0; $i <$tailleFiche ; $i++) {
      echo "le nom de la feuille $i ".$nom[$i]."</br>";
    }?></p>
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
        <table class="table">
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
        //}
           ?>
         </tr>
        </table>
    </div>
    <?php
  }
//}
   ?>
  </body>
</html>
