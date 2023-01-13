<?php



function dbFunction()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=store_sp;charset=utf8',
            'root',
            '',
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
            ]

        );
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function findAll()
{
    $db = dbFunction();

    $sqlQuery = 'SELECT * FROM product';
    $storeStatement = $db->prepare($sqlQuery);

    $storeStatement->execute();
    $store = $storeStatement->fetchAll();
    return $store;
}
function findOneById($id)
{
    $db = dbFunction();

    $sqlQuery = 'SELECT * FROM product WHERE id= :id';
    $storeStatement = $db->prepare($sqlQuery);

    $storeStatement->execute([':id'=>$id]);
    $store = $storeStatement->fetch();
    return $store;
}
function insertProduct($name, $price, $description){
    $db = dbFunction();
    $sqlQuery = 'INSERT INTO product (name, price, description)
    VALUES (:name, :price, :description)';

    $storeStatement = $db->prepare($sqlQuery);
    $storeStatement->execute([':name'=>$name, ':price'=>$price, ':description'=>$description]);
    $store = $storeStatement->fetch();
    return $store;
}

/* La fonction utilise la méthode prepare() de l'objet PDO pour préparer une requête SQL qui recherche des produits dont le nom ou la description contient les données de recherche. La requête utilise le LIKE pour pouvoir utiliser le joker %. Les paramètres sont liés à la requête en utilisant bindParam() pour éviter les risques d'injection SQL.
Ensuite la requête est executée en utilisant la méthode execute().
Les résultats sont stockés dans la variable $results et la fonction retourne finalement ces résultats pour pouvoir les afficher dans la page de recherche.*/
function searchProducts($search) {
    $db = dbFunction();
    // Utilisez des requêtes préparées pour éviter les risques d'injection SQL
    $stmt = $db->prepare("SELECT * FROM product WHERE name LIKE ? OR description LIKE ?");
    $search = '%' . $search . '%';
    $stmt->bindParam(1, $search);
    $stmt->bindParam(2, $search);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}


