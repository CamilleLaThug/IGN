<?php 

    $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201650;charset=utf8";
    $user = "dutinfopw201650";
    $password = "zugetene";

	$connexion = new PDO($dns, $user, $password);


	 if(isset($_GET['motclef'])){
        $motclef = $_GET['motclef'];
        $sql = 'SELECT * FROM produit WHERE libelle LIKE :motclef';
        $fsearch = $connexion->prepare($sql);
        $fsearch->execute(array(
            'motclef' => $motclef. '%'
        ));
        $count = $fsearch->rowCount($sql);
         
        if ($count >= 1){
            while ($result = $fsearch->fetch()){
                ?>
                <a href="index.php?module=produit&id=<?=$result["id_produit"] ?>"><?=$result['libelle']?></a>
                <?php 
                echo "<br/>";
            }
        }
        $fsearch->closeCursor();
    }
?>