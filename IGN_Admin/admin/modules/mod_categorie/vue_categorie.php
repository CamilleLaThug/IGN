<?php

class VueCategorie extends VueGenerique{

	function vue_ajout_categorie(){
		
		?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter une Catégorie</h1>
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
                                    <form action="index.php?module=categorie&action=add" method="POST">
                                        <div class="form-group">
                                            <label>Nom de la categorie</label>
                                            <input name="nom_categorie" class="form-control" placeholder="Entrer nom de la categorie">
                                        </div>
                                              
          
                                        <button type="submit" class="btn btn-primary">Ajouter la Catégorie</button>
                                        <button type="reset" class="btn btn-default">Réinitialiser</button>
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

		function affiche_modif_categorie($tab){
				?>


				 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Liste des Catégories</h1>
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
                                        <th>ID Categorie</th>
                                        <th>Libelle</th>
                                        <th>Actions</th>
                          

                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                	foreach ($tab as $resultat) {
                                	?>
                                    <tr class="odd gradeX">
                                        <td><?= $resultat['id_categorie']?></td>
                                        <td style="width: 70%;"><?= $resultat['libelle']?></td>
                                        <td>
                                            <a href="index.php?module=categorie&edit=<?=$resultat["id_categorie"] ?>">
                                                <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?module=categorie&del=<?=$resultat["id_categorie"] ?>">
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                            
                                            
                                        </td>
 


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


		function vue_edit_categorie(){
			?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier une Catégorie</h1>
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
                                    <form action="index.php?module=categorie&action=edit&id=<?=$_GET["edit"] ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nom de la categorie</label>
                                            <input name="nom_categorie" class="form-control" placeholder="Entrer nom de la categorie">
                                        </div>
                                              
          
                                        <button type="submit" class="btn btn-primary">Modifier la Catégorie</button>
                                        <button type="reset" class="btn btn-default">Réinitialiser</button>
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




}

?>