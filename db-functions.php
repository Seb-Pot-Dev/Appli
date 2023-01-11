<?php


try
{
$db = new PDO(
    'mysql:host=localhost;dbname=store;charset=utf8',
    'root',
    'root'
);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'SELECT * FROM recipes';
$storeStatement = $mysqlClient->prepare($sqlQuery);

$storeStatement->execute();
$store = $storeStatement->fetchAll();

// On affiche chaques produits un a un
foreach($store as $product){
?>
    <p><?php echo $product['author']; ?></p>
<?php
}
?>