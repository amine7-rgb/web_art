

<?php


    include "../controleur/categorieC.php";
 //   include "ajouterCategorie.php";
    $categorieC = new categorieC();

    if (isset($_POST['id'])) 
    {
        $categorieC->supprimerCategorie($_POST['id']);
        header('location:../view/afficherCategorie.php');
    }
    
   
  
?>
