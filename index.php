<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <title>Ajout produit</title>
</head>
<body>
    
    <?php
        require_once('db-functions.php');
        
        $store = findAll();
        
        
        // On affiche chaques produits un a un
        foreach ($store as $product) {
        ?>
        <article>
            <a href="product.php?id=<?= $product['id'] ?>"><?= $product['name']; ?></a>
            <?php // l'expression "<?=" est equivalent a <?php echo ?>
            <p><?= $product['price']; ?></p>
            <p><?= mb_strimwidth($product['description'],0, 50+3, "...");?></p>
        </article>
        <?php
        }
        ?>