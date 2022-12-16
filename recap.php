<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylerecap.css">
    <title>Récapitulatif des produits</title>
</head>

<body>
    <?php
    
    //VERIFY IF $_SESSION['products'] exist || VERIFY IF $_SESSION['products'] is empty
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";
    } 
    //In case $_SESSION['products'] exist and isnt empty, display a table header(#, Nom, Prix, Quantité, Total)
    else { 
        echo "<table border=4px>",
        "<thead>",
        "<tr>",
        "<th>#</th>",
        "<th>Nom</th>",
        "<th>Prix</th>",
        "<th>Quantité</th>",
        "<th>Total</th>",
        "</tr>",
        "</thead>",
    //Then we initialize the tbody, wich will be rows for each products with all informations about it.
    "<tbody>";
    $totalGeneral = 0; // Initialize a new variable $totalGeneral to 0.
    $qttTotal=0;// Initialize a new variable $qttTotal to 0.
    
    //creating a foreach loop to display each data elements of the $_SESSION['products'] array. Each element has 2 variable : $index and $product; For each loop, the price ($product['total]) is added to $totalGeneral so we have the total price.
    foreach ($_SESSION['products'] as $index => $product) { 
        echo "<tr>",
        "<td>" . $index . "</td>",
        "<td>" . $product['name'] . "</td>",
        "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>", /*number_format allows to modify the display of a numerical value according to different parameters as: number_format(variable à modifier, nombre de décimales souhaité,caractère séparateur décimal, caractère séparateur de milliers) */
        "<td>" . $product['qtt'] . "</td>",
        "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
        "</tr>";
        //We add the product total price to $totalGeneral, wich will be done for each elements "product" of the array thanks to the foreach boucle.
            $totalGeneral += $product['total']; // EACH LOOP,  PRICE*QTT is added to $totalGeneral, so we have the total cost of all products and quantities added.
            $qttTotal += $product['qtt'];// EACH LOOP, $product['qtt'] is added to $qttTotal, so we have the total amount of products. If your take 36 exemples of 1 products, qttTotal takes +36
        }
        // Now the foreach boucle is over, we're doing an echo of a row wich is composed of 2 cells. The first one fusionate 3 cells (colspan=3) and display "Total général:", the second one display $qttTotal, the third one display the $totalGeneral formatted with number_format()
        echo "<tr>",
        "<td colspan=3>Total général : </td>",
        "<td><strong>" . $qttTotal . "</strong></td>", 
        "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>", 
        "</tr>",
        "</tbody>",
        "</table>";
// $_SESSION['qttTotal']+=$_SESSION['product']['qtt']
    }
    ?>
</body>

</html>
