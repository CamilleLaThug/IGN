<?php

class VuePanier extends VueGenerique{

	function panier_vue_affiche($totalPrix){
		?>
	    <div id="page-wrapper" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Panier</h1>
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
                                        <th>#</th>
										<th>Libelle</th>
										<th>Quantité</th>
										<th>Prix</th>
                                        <th>Prix Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $nbrProduits = count($_SESSION['panier']['libelle']);
                                   	for ($i=0; $i<$nbrProduits ; $i++) { 
                                   ?>
                                    <tr class="odd gradeX">
                                        <td><?= $i+1;?></td>
										<td><?= $_SESSION['panier']['libelle'][$i];?></td>
										<td><?= $_SESSION['panier']['quantiteProd'][$i];?></td>
										<td><?= $_SESSION['panier']['prixProd'][$i]; ?></td>
                                        <td></td>
                                        <td>
                                             <a href="index.php?module=panier&action=supprimerArticle">
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                        </td>
								<?php
									}
								 ?>
                                    </tr>
                                    
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td><?=$totalPrix?> €</td>
                                </tbody>
                            </table>
                        </div>
                        <a href="index.php?module=panier&action=vider" class="btn btn-primary">Vider le Panier</a>
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