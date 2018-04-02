<?php

class VueSite extends VueGenerique{

	function vue_global($donnees){
      ?>
             <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Informations du site</h1>
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
                                        <th>Nom du Site</th>
                                        <th>Email du site</th>
                                        <th>Numero de Tel</th>
                                        <th>Actions</th>
                          

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($donnees as $resultat) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $resultat['nom_du_site']?></td>
                                        <td><?= $resultat['email_du_site']?></td>
                                        <td>+33<?= $resultat['numero_de_tel']?></td>
                                        <td>
                                            <a href="index.php?module=site&edit=<?=$resultat["id_site"] ?>">
                                                <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i>
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



        function vue_edit_site(){
            ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier site</h1>
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
                                    <form action="index.php?module=site&action=edit&id=<?=$_GET["edit"] ?>" method="POST">
                                        <div class="form-group">
                                            <label>Nom du site</label>
                                            <input name="nom_site" class="form-control" placeholder="Entrer nom de votre site">
                                        </div>
                                        <div class="form-group">
                                            <label>Email du site</label>
                                            <input name="email_site" class="form-control" placeholder="Entrer email de votre site">
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de tel</label>
                                            <input name="tel_site" class="form-control" placeholder="Entrer votre numero de telephone">
                                        </div>
          
                                        <button type="submit" class="btn btn-primary">Modifier votre site</button>
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