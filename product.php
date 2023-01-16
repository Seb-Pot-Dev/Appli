<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <?php require_once('db-functions.php'); 
    $product = findOneById($_GET['id']);?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productStyle.css">
    <script src="https://kit.fontawesome.com/a45e9c27c8.js" crossorigin="anonymous"></script>
    <title><?= ucFirst($product['name']) ?></title>
</head>
<body>
<nav>
    <a href="index.php"><i class="fa-solid fa-house"></i></a>
    <form action="search.php" method="post">
        <input type="text" name="search" >
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <a href="recap.php"><i class="fa-solid fa-cart-shopping"></i></a>
</nav>
<?php


?>
<main>
<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="product-detail">
        <img class='img-zoom' src='<?= $product['image_url']?>'>
            <div class="product-info">
                <p><?= ucFirst($product['name']) ?></p>
                <p><?= $product['price']; ?>€</p>
            
        <p><?= $product['description'] ?></p>
        <a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter au panier<i class="fa-solid fa-cart-arrow-down"></i></a>
    </div>
    </div class="product-detail">
</main>
