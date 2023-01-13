<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <script src="https://kit.fontawesome.com/a45e9c27c8.js" crossorigin="anonymous"></script>
    <title>Ajout produit</title>
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
'<a href="index.php">Retour</a>';

require_once('db-functions.php');

$product = findOneById($_GET['id']);

?>
<a href="index.php">Retour</a>

<p><?= ucFirst($product['name']) ?></p>
<p><?= $product['description'] ?></p>
<p><?= $product['price']; ?></p>

<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>
