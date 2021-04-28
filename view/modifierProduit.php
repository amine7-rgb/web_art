<?php
include_once "../controleur/produitC.php";
    include_once '../model/produit.php';

	$prodC = new produitC();
	$error = "";



    if (isset($_GET['id'])){
        $prod = $prodC->recupererproduit($_GET['id']); 
    }


	if (
        isset($_POST["type"]) &&
        isset($_POST["prix"]) &&
        isset($_POST["capacite"]) &&
        isset($_POST["datefin"])
    ){
		if (
            !empty($_POST["type"]) &&
            !empty($_POST["prix"]) &&
            !empty($_POST["capacite"]) &&
            !empty($_POST["datefin"])
        ) {
            $prod = new produit(
                $_POST['type'],
                $_POST['prix'],
                $_POST['capacite'],
                $_POST['datefin']
            );
            $prodC->modifierproduit($prod, $_GET['id']);
            header('Location: afficherproduit.php');
        }
    
        else
            $error = "Missing information";
	}


?>

<html>
	<head>
		<title>Modifier produit</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="image/jpg" href="banner.jpg"> 
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	</head>
	<body>
    <section class = "banner">
		<button><a href="afficherproduit.php">Retour à la liste</a></button>
        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>

		

		
    <form action="modifierProduit.php" method="POST">
    
     <label for="type">type:  </label>
     <input type="text" name="type" id="type" value ="<?php echo $prod['type']; ?>">
     <br>
     <label for="prix">prix:  </label>
     <input type="number" name="prix" id="prix" value ="<?php echo $prod['prix']; ?>">
     <br>
     <label for="capacite">capacite:  </label>
     <input type="text" name="capacite" id="capacite" value ="<?php echo $prod['capacite']; ?>">
     <br>
     <label for="datefin">datefin:  </label>
     <input type="text" name="datefin" id="datefin" value ="<?php echo $prod['datefin']; ?>">
     <br>
     <br>
     
        <input type="submit" value="Modifier" name = "modifer">
        <br>
        <input type="reset" value="Annuler" >
            

        </form>
       
  </body>
    </html>