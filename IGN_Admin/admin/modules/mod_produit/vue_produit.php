<?php

class VueProduit extends VueGenerique{

	function vue_ajout_produit($listeCat){
		
		?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter un Utilisateur</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="index.php?module=produit&action=add" method="POST">
                                        <div class="form-group">
                                            <label>Nom de l'utilisateur</label>
                                            <input name="nom_utilisateur" class="form-control" placeholder="Entrer nom du produit">
                                        </div>
                                        <div class="form-group">
                                            <label>Mot de passe de l'utilisateur</label>
                                            <input name="pass_utilisateur" class="form-control" placeholder="Entrer réference du produit">
                                        </div>
                                         <div class="form-group">
                                            <label>Email de l'utilisateur</label>
                                            <input name="mail_utilisateur" class="form-control" placeholder="Entrer réference du produit">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ajouter Utilisateur</button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

		<?php 

	}


		function vue_edit_produit($listeCat,$tab_produit){
			?>
<div id="page-wrapper">
                <?php 
                    foreach ($tab_produit as $resultat) {
                
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier le Produit : <?= $resultat['libelle']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="index.php?module=produit&action=edit&id=<?=$_GET["edit"] ?>" method="POST">
                            
                                        <div class="form-group">
                                            <label>Nom du Produit</label>
                                            <input value="<?= $resultat['libelle'] ?>" name="nom_produit" class="form-control" placeholder="Entrer nom du produit">
                                        </div>
                                        <div class="form-group">
                                            <label>Réference du Produit</label>
                                            <input value="<?= $resultat['ref_produit'] ?>" name="ref_produit" class="form-control" placeholder="Entrer réference du produit">
                                        </div>
                                         <div class="form-group input-group">

                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input value="<?= $resultat['prix_ttc'] ?>" name="prix_produit" type="text" class="form-control" placeholder="Prix">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description_produit" class="form-control" rows="3"><?= $resultat['description'] ?></textarea>
                                        </div>
                                        <div class="form-group">

                                            <label>Image du Produit</label>

                                            <input  name="img_produit" type="file">
                                        </div>
                                        <?php 
                                             }
                                         ?>
          
                                        <div class="form-group">
                                            <label>Categorie</label>
                                            <select name="cat_produit" class="form-control">
                                            		<?php
                                            		foreach ($listeCat as $resultat) {
                                            			?>
                                                	<option value="<?=$resultat['id_categorie']?>"><?=$resultat['libelle']?></option>
                                                	<?php 
                                        		}
                                        		     	 ?>
                                            </select>
                                        </div>
          
                                        <button type="submit" class="btn btn-primary">Modifier Produit</button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <?php 
		}

        function affiche_Utilisateur($tab){
                ?>


                 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Liste des Utilisateurs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id_Membre</th>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($tab as $resultat) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $resultat['idMembre'] ?></td>
                                        <td><?= $resultat['nom'] ?></td>
                                    </tr>
                                    <?php 
                                    }
                                     ?>
                                </tbody>
                            </table>
 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

                <?php 
        }




}

?>