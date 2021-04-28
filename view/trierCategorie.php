<?php
include "../controleur/categorieC.php";
$categorie=new categorieC();
$listecategorie=$categorie->trierCategorie();

?>


<html>
<header>
    <title>afficher</title>
    <h1 class="text-center">GESTION DES categories </h1> 
</header>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<br>
<div class="Button" align="center">  
<a href="ajoutercategorie.php?ajouter=8" class="btn btn-primary btn-lg active" role="button" title="ajouter">ajouter une categorie</a>
</div>
<br>
<div claas="d-flex table-data">
<table class="table table-striped table-dark">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>NOM</th>
<th>TYPE</th>

</tr>
</thead>   
    <?php foreach($listecategorie as $categorieC) { ?>
    <tr> 
    <td>
    <?php echo $categorieC['id'] ;?>
    </td>
    <td>
    <?php echo $categorieC['nom'] ;?>
    </td>
    <td>
    <?php echo $categorieC['type'] ;?>
    </td>
    


    <td> 
                     <form method="POST" action="../view/supprimerCategorie.php">
                                        <button type="submit"  id="supprimer"  class="btn btn-danger" onclick="Supp()">supprimer</button>
                                        <input type="hidden" value=<?PHP echo  $categorieC['id']; ?> >
                                        </form>
                                        
                    			  
     </td>
    
        
    <td> 
                     <form method="POST" action="../view/modifierCategorie.php">
                                        <button type="submit"  id="modifier"  class="btn btn-danger" onclick="Modif()">modifier</button>
                                        <input type="hidden" value=<?PHP echo  $categorieC['id']; ?> >
                                        </form>
                                        
                    			  
     </td>

     <!--<a class="btn btn-success" href="trierCategorie.php?id= <?PHP// echo $row['prix']; ?>">Trier </a>
-->

    </tr>
    <?php } ?>
 
</table>
</div>
</html>