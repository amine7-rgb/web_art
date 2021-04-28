<?php 

require_once "../controleur/produitC.php" ;
$produitC =  new produitC();

$listeproduit = $produitC->afficherProduit();


?>


<html>
<header>
    <title>afficher</title>
    <h1 class="text-center">GESTION DES produits </h1> 
</header>
<body>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<br>


<td>
   <button>
   <input type="button" value = "Rafraîchir" onclick="history.go(0)" />
</button>
</td>


<div class="Button" align="center">  
<a href="ajouterProduit.php?ajouter=8" class="btn btn-primary btn-lg active" role="button" title="ajouter">ajouter un produit</a>
</div>
<br>
<div claas="d-flex table-data">
<table class="table table-striped table-dark">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>TYPE</th>
<th>Prix</th>
<th>Capacite</th>
<th>DateFin</th>
</tr>
</thead>   
    <?php foreach($listeproduit as $produitC) { ?>
    <tr> 
    <td>
    <?php echo $produitC['id'] ;?>
    </td>
    <td>
    <?php echo $produitC['type'] ;?>
    </td>
    <td>
    <?php echo $produitC['prix'] ;?>
    </td>
    <td>
    <?php echo $produitC['capacite'] ;?>
    </td>
    <td>
    <?php echo $produitC['datefin'] ;?>
    </td>




    <td> 
                     <form method="POST" action="../view/supprimerProduit.php">
                                        <button type="submit"  id="supprimer"  class="btn btn-danger" onclick="confirmer()" >supprimer</button>
                                        <input type="hidden" value=<?PHP echo  $produitC['id']; ?> name="id">
                                        
                                        </form>
                                        
                    			  
     </td>
    
        
    <td> 
                     
                                     
                                        <a type="button" class="btn btn-primary shop-item-button" href = "../view/modifierProduit.php?id=<?= $produitC['id'] ?>">Modifier</a>    
                                
                                        
                    			  
     </td>
     <!--<a class="btn btn-success" href="trierProduit.php?id=<?PHP echo $row['type']; ?>">Trier </a>
   -->
     <td> 
                     <form method="POST" action="../view/trierProduit.php">
                                        <button type="submit"  id="trier"  class="btn btn-danger" >trier</button>
                                        <input type="hidden" value=<?PHP echo  $produitC['id']; ?> name="id">
                                        </form>
                                        
                    			  
     </td>
     <td> 
                                        <form method="POST" action="../view/rechercherProduit.php">
                                        <button type="submit"  id="rechercher"  class="btn btn-danger" >rechercher</button>
                                        <input type="hidden" value=<?PHP echo  $produitC['id']; ?> name="id">
                                        </form>
                                        
                    			  
     </td>
  
     


    </tr>
    
       
    <?php } ?>
 
</table>
<button class="btn btn-primary" onclick="print('http://localhost/Projet/view/afficherProduit.php')">Imprimer le PDF</button>
</div>
<script>
   function print(pdf)
			 {
                    // Créer un IFrame.
        var iframe = document.createElement('iframe');  
        // Cacher le IFrame.    
        iframe.style.visibility = "hidden"; 
        // Définir la source.    
        iframe.src = pdf;        
        // Ajouter le IFrame sur la page Web.    
        document.body.appendChild(iframe);  
        iframe.contentWindow.focus();       
        iframe.contentWindow.print(); // Imprimer.
             }
</script>


<script>
function confirmer(){
    var res = confirm("Êtes-vous sûr de vouloir supprimer?");
    if(res){
        // Mettez ici la logique de suppression
    }
}</script>


</body>
</html>