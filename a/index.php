
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

              <?php
              foreach ($getSheet as $key) {
                      
                ?>
                <thead>
                  coucou
                </thead>
                <tr>
                  <?php

                $cpt=0;
                foreach ($key as $cle => $value) {
                        $cpt++; 
                        //$cle colonne ??  
                        //$value ligne 
                       // var_dump($cle);
                    ?>
                      <td>
                    <?php 
                          //choisir la bonne colonne
                    /*  $findme="Note (1 à 5)";
                    if(!strcmp($value, $findme)){
                        echo 'coucou'; 
                      }    */ 
                      if($cpt==2) {
                        // crer liste deroulante ?>
                        <select name="note" "test">
                          <option value="--">--</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                            <?php                  
                        }                  
                      if($cpt==3){ ?> 
                      <input type="text" name="commentaire" placeholder="commentaire">

                      <?php
                      }  
                      if($cpt==4){  ?> 

                     <input type="text" name="eventuelle" placeholder="question eventuelle">

                      <?php

                      }               
                       echo $value; ?>
                      
                    </td>

                    <?php
              }

              }
               ?>
             </tr>
            </table>
        </div>
        <input type="submit" value="Valider" title="valider pour créer le fichier excel" />        

        <?php

       

        /*
          foreach ($getSheet as $key => $val) {
          ?>

              <th><?php echo $key; ?></th>

          <?php
          }
          */
     }
     
       //function valider($tab){
            /*$note=$_POST["note"];
            $commentaire=$_POST["commentaire"];
            $eventuelle=$_POST["eventuelle"];
            var_dump($note);
          if(!empty($note) || !empty($commentaire) || !empty($eventuelle)){
            echo 'coucou';
             }   
             else {
                    //creation du tableau
                  $tab=array($note, $commentaire, $eventuelle);
               // var_dump($tab);
      //}


        
        }
      */
         /*   if(submit == valider){
           functionBineta($tab); 
            return $tabBis;
          }*/
       ?>

  </body>
</html>
