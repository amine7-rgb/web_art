<?php

require_once "../controleur/ProduitC.php" ;
require_once "../model/produit.php";

$error = "";

// create produit
$produit = null;
// create an instance of the controller
$ProduitC = new ProduitC();


if (
   /* isset($_POST["id"]) && */
    isset($_POST["type"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["categorie"])&&
    isset($_POST["datefin"])
  )
{
  if (
   
    //!empty($_POST["id"]) && 
    !empty($_POST["type"]) &&
    !empty($_POST["prix"]) &&
    !empty($_POST["categorie"]) && 
    !empty($_POST["datefin"])
     )
  {
    $produit = new Produit(
      //  $_POST['id'],
        $_POST['type'], 
        $_POST['prix'],
        $_POST['categorie'],
        $_POST['datefin']
    ); 
      $ProduitC->ajouterProduit($produit);
    header('Location:afficherProduit.php');
  }
  else
            $error = "Missing information";
}
















?>

<html>

<head>
    <title>Ajouter produit</title>
</head>

<body>

    <script type="text/javascript">
        function test() {

            if (document.myform.nom.value.length == 0) {


                alert("veuillez remplir le champ");

            }

            if (document.myform.idproduit.value.length == 0) {


                alert("veuillez remplir le champ");

            }

        }
    </script>
    <fieldset>

        <legend>Ajouter produit</legend>

        <form method="POST" name="myform" action=ajouterProduit.php>
            <table>

               
                <tr>
                    <td>type :</td>
                    <td><input type="text" name="type"></td>

                </tr>
                <tr>
                    <td>categorie:</td>
                    <td><input type="text" name="categorie"></td>

                </tr>

                <tr>
                    <td>prix :</td>
                    <td><input type="number" name="prix"></td>

                </tr>

                <tr>
                    <td>datefin :</td>
                    <td><input type="text" name="datefin"></td>
                </tr>
                



                <tr>
                    <td> </td>
                    <td><input type="submit" name="ajouter" value="ajouter" onclick="test()"></td>

                </tr>


            </table>
        </form>
        




    </fieldset>









</body>

</html>
