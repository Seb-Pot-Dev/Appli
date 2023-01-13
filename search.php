<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <script src="https://kit.fontawesome.com/a45e9c27c8.js" crossorigin="anonymous"></script>
    <title>Résultat de la recherche</title>
</head>
<?php require_once('db-functions.php'); ?>

<body>
<nav>
    <a href="index.php"><i class="fa-solid fa-house"></i></a>
    <form action="search.php" method="post">
        <input type="text" name="search" >
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <a href="recap.php"><i class="fa-solid fa-cart-shopping"></i></a>
</nav>
    <main>
    <?php
        require_once('db-functions.php');
        
     // Récupère les données de la recherche
     $search = strtolower($_POST['search']);

     // Appelle une fonction qui effectue la recherche dans la base de données en utilisant les données de la recherche
     $results = searchProducts($search);
 
     // Affiche les résultats de la recherche
     foreach ($results as $product) {
        ?>
        <article >
            <a class="articleContent" href="product.php?id=<?= $product['id'] ?>">
                <div class="img-background">
                    <img src="<?= $product['image_url'] ?>" alt="<?= ucFirst($product['name']) ?>">
                </div>
                <div class="nameAndPrice" >
                    <a class="productName" href="product.php?id=<?= $product['id'] ?>"> <?= ucFirst($product['name']); ?></a>
                    <?php // l'expression "<?=" est equivalent a <?php echo ?>
                    <p class='price'>€<?= $product['price']; ?></p>
                </div>
            </a>
        </article>
        <?php
    }
    ?>

    </main>
