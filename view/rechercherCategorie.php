<?php
    require_once "../controleur/categorieC.php" ;

    $categorieC =  new categorieC();
    $listecategorie=$produitcategorie->afficherCategorie();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>rechercher categorie</title>
	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>Search categorie: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'categorie'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type = "submit" value = "Search" name ="search">
                </div>
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['type']) && isset($_POST['prix']) && isset($_POST['capacite']) && isset($_POST['datefin'])){
			$result = $produitC->getproduitbytype($_POST['produit']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>MUSIC</h2>
			<a href = "afficherProduit.php" class="btn btn-primary shop-item-button">All albums</a>
			<div class="shop-items">
				
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['type'] ?> </strong>
					
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $result['prix'] ?> dt.</span>
					</div>
				</div>
				
			</div>
		</section>
	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>
	

	<script src="../assets/js/script.js"></script>
</body>

</html>