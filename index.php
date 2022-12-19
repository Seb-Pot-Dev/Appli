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
    <div id="container">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">
            <p class='form'>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p class='form'>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p class='form'>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input id="addProduct" type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
    </div>
</body>

<button id="basket" onclick="location.href='recap.php'" type="button">
    Mon panier (<?php
                $total = 0;
                if (isset($_SESSION['products'])) {
                    foreach ($_SESSION['products'] as $index => $product) {
                        $total += $product['qtt'];
                    }
                }
                echo $total ?>)
                
</button>

</html>