
<?php
  require_once 'Classes\PHPExcel\IOFactory.php';
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
      <form class="grille" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="xslFille" value="Excel">
        <input type="submit" name="envoi" value="rechercher">
      </form>


      <?php

      if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
        $xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
        $getSheet = $xslObject->getActiveSheet()->toArray();
       //var_dump($getSheet);
        ?>
        <div class="container">


            <table class="table">

              <?php//var_dump($getSheet);
              foreach ($getSheet as $key) {
                      
                ?>
                <tr>
                  <?php
                  $key2= array_filter($key);
                foreach ($key2 as $cle => $value) {

 
                    ?>
                      <td>
                    <?php 
             
                       echo $value; ?>
                      
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
