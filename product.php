<?php
'<a href="index.php">Retour</a>';

require_once('db-functions.php');

$product = findOneById($_GET['id']);

?>
<a href="index.php">Retour</a>

<p><?= $product['name']; ?></p>
<p><?= $product['description'] ?></p>
<p><?= $product['price']; ?></p>

<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>