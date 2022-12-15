<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif des produits</title>
</head>

<body>
    <?php

    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) { //This IF condition verify: Or the 'products' key doesn't exist, or this key exist but is empty, in both case it returns an echo.
        echo "<p>Aucun produit en session...</p>";
    } else { //In case the IF isnt true, ELSE is operating and display an HTML table.
        echo "<table>",
        "<thead>",
        "<tr>",
        "<th>#</th>",
        "<th>Nom</th>",
        "<th>Prix</th>",
        "<th>Quantité</th>",
        "<th>Total</th>",
        "</tr>",
        "</thead>",

        "<tbody>";
        $totalGeneral = 0; // Initialize a new variable $totalGeneral to 0
        foreach ($_SESSION['products'] as $index => $product) { //creating a foreach loop to display each data elements of the $_SESSION['products'] array. Each element has 2 variable : $index and $product;
            echo "<tr>",
            "<td>" . $index . "</td>",
            "<td>" . $product['name'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>", /*number_format allows to modify the display of a numerical value according to different parameters as: number_format(variable à modifier, nombre de décimales souhaité,caractère séparateur décimal, caractère séparateur de milliers) */
            "<td>" . $product['qtt'] . "</td>",
            "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "</tr>";
            $totalGeneral += $product['total']; //We add the product total price to $totalGeneral, wich will be done for each elements "product" of the array thanks to the foreach boucle.
        }
        // Now the foreach boucle is over, we're doing an echo of a row wich is composed of 2 cells. The first one fusionate 4 cells (colspan=4) and display "Total général:", the second one display the $totalGeneral formatted with number_format()
        echo "<tr>",
        "<td colspan=3>Total général : </td>",
        "<td><strong>" . count($_SESSION['products'])."</strong></td>",
        "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
        "</tr>",
        "</tbody>",
        "</table>";
        
    }
    ?>
</body>

</html>