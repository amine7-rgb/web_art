<?php 

require_once "../controleur/categorieC.php" ;
$categorieC =  new categorieC();

$listecategorie = $categorieC->afficherCategorie();


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;



$listecategorie = $categorie->afficherCategorie($page, $perpage);
$totalP = $categorie->calcTotalRows($perpage);

if(isset($_GET['recherche']))
                       {
                        $search_value=$_GET["recherche"];
                       
                        $listecategorie= $categorie->recherche($search_value);
                        }




?>
<html>
<header>
    <title>afficher</title>
    <h1 class="text-center">GESTION DES categories </h1> 
    <script type="text/javascript"> 
         function refresh(){
             var t = 1000; // rafraîchissement en millisecondes
             setTimeout('showDate()',t)
         }
         
         function showDate() {
             var date = new Date()
             var h = date.getHours();
             var m = date.getMinutes();
             var s = date.getSeconds();
             if( h < 10 ){ h = '0' + h; }
             if( m < 10 ){ m = '0' + m; }
             if( s < 10 ){ s = '0' + s; }
             var time = h + ':' + m + ':' + s
             document.getElementById('horloge').innerHTML = time;
             refresh();
          }
      </script>
</header>
<body  onload=showDate();>
      <span id='horloge' style="background-color:#1C1C1C;color:silver;font-size:40px;"> </span>>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<br>


<div class="Button" align="center">  
<a href="ajouterCategorie.php?ajouter=8" class="btn btn-primary btn-lg active" role="button" title="ajouter">ajouter une categorie</a>
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
   <!-- <td>
    <?php echo $categorieC['id'] ;?>
    </td> -->
    <td>
    <?php echo $categorieC['nom'] ;?>
    </td>
    <td>
    <?php echo $categorieC['type'] ;?>
    </td>
    


    <td> 
                     <form method="POST" action="../view/supprimerCategorie.php">
                                        <button type="submit"  id="supprimer"  class="btn btn-danger" onclick="Supp()">supprimer</button>
                                        <input type="hidden" value=<?PHP echo  $categorieC['id'];   ?> name="id" >
                                        </form>
                                        
                    			  
     </td>
    
        
    <td> 
                     <form method="POST" action="../view/modifierCategorie.php">
                                        <button type="submit"  id="modifier"  class="btn btn-danger" onclick="Modif()">modifier</button>
                                        <input type="hidden" value=<?PHP echo  $categorieC['id']; ?> >
                                        </form>
                                        
                    			  
     </td>
     <!--<a class="btn btn-success" href="trierProduit.php?id=<?PHP //echo $row['type']; ?>">Trier </a>
   -->
     <td> 
                     <form method="POST" action="../view/trierCategorie.php">
                                        <button type="submit"  id="trier"  class="btn btn-danger" >trier</button>
                                        <input type="hidden" value=<?PHP echo  $categorieC['id']; ?>>
                                        </form>
                                        
                    			  
     </td>
     <td> 
                                       
                            <form method="GET" action="afficherCategorie.php"  class="mb-4">
                            <input type="text" class="form-control" name="recherche" placeholder="product">
                            <br>
                            <input type="submit" class="btn btn-primary"  value="Chercher">
                            </form>
                                        
     </td>
  
    </tr>
    <?php } ?>
 
</table>
<button class="btn btn-primary" onclick="print('http://localhost/Projet/view/afficherCategorie.php')">Imprimer le PDF</button>
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
</body>
</html>

<html>

  