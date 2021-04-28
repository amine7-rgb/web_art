

<?php
    include "../controleur/produitC.php";
    include "ajouterProduit.php";
    $ProduitC = new ProduitC();

    if (isset($_POST['id'])) 
    {
        $ProduitC->supprimerProduit($_POST['id']);
        header('location:../view/afficherProduit.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    
    }
  
?>
