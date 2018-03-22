
<?php
  require_once '../Classes/PHPExcel/IOFactory.php';
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
       var_dump($getSheet);
        ?>
        <div class="container">


            <table class="table">

              <?php
             /* $var=array(1);
              echo $var;*/
              foreach ( $getSheet as $key) {
                      
                ?>
                <tr>
                  <?php
                $key2= $key //enlever array filter
                ;
                $cpt=0;
                foreach (  $key2 as $cle => $value) {
                        $cpt++; 
                    ?>

                    <td>

                      <?php 
                      if($cpt==3) {
                        // crer liste deroulante ?>
                        <select name "test">
                          <option name="note">--</option>
                          <option name="note">1</option>
                          <option name="note">2</option>
                          <option name="note">4</option>
                          <option name="note">5</option>
                        </select>
                            <?php                  
                        }
                      //choisir la bonne colonne
                    /*  $findme="Note (1 à 5)";
                    if(!strcmp($value, $findme)){
                        echo 'coucou'; // affichage somme des notes
                      }    */ 
                      if($cpt==4){ ?> 
                      <textarea name="commentaire"> </textarea>

                      <?php

                      }  
                      if($cpt==5){ ?> 
                      <textarea name="eventuelle"> </textarea>

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
        <input type="submit" value="Valider" title="valider pour aller à la page sélectionnée" />        

        <?php

        function valider($tab){
             $note=$_POST['note'];
            $commentaire=$_POST['commentaire'];
            $eventuelle=$_POST['eventuelle'];
            //mettre nom variable
          if(empty($_POST['note']) || empty($_POST['commentaire']) || empty($_POST['eventuelle'])){
            echo 'coucou';
             }   
             else {
                    //creation du tableau
                  $tab=array($_POST['note'], $_POST['commentaire'],$_POST['eventuelle']);
                
      }

       /*   if(submit == valider){
            functionBineta($tab); 
            return $tabBis;
          }*/
        
        }
      
        

        /*
          foreach ($getSheet as $key => $val) {
          ?>

              <th><?php echo $key; ?></th>

          <?php
          }
          */


      }

       ?>

  </body>
</html>
