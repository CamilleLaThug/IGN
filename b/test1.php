
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
      <form class="grille" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="xslFille" value="Excel">
        <input type="submit" name="envoi" value="rechercher">
      </form>


      <?php

      if (isset($_FILES['xslFille']) && !empty($_FILES['xslFille']['tmp_name'])) {
        $xslObject = PHPExcel_IOFactory::load($_FILES['xslFille']['tmp_name']);
        $getSheet = $xslObject->getActiveSheet()->toArray();
        //var_dump($getSheet);

        $array = array($getSheet[1]);
        $arrayAll= array_shift($getSheet);
        //print_r($array);
       //print_r($arrayAll);
        var_dump($array);
?> <br><br> <?php

       var_dump($getSheet);

        ?>
        <div class="container">


            <table class="table">
               <?php 
                  foreach($array as $cle => $val){
                      //var_dump($val);
                    ?> 
                    <thead>
                    
                    <?php 
                      foreach ($val as $value) {
                       //var_dump($value);
                        ?>
                        <tr>
                       <?php
                       echo $value;
                       ?>
                       </tr>
                      
                      
                       <?php 
                      }
                  }
                  ?>
                   </thead>
               <tbody> 
              <?php //var_dump($getSheet);
              //var_dump($arrayAll);
              //print_r($arrayAll);
              foreach ($getSheet as $key) {

                ?>
                <tr>
                  <?php
                //  $key2= array_filter($key);
                foreach ($key as $cle => $value) {

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
             </tbody>
            </table>
        </div>
      
        <?php
     }
     
       ?>

  </body>
</html>
