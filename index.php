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
    <main id="background">

        <?php
        require_once('db-functions.php');


        $store = findAll();


        // On affiche chaques produits un a un
        foreach ($store as $product) {
        ?>
            <p><?= $product['name']; ?></p>
            <p><?= $product['price']; ?></p>
        <?php
        }


        // Check if a message is set in the session
        if (isset($_SESSION['message'])) {
            // Display the message with class='message' style
            echo '<div class="message">' . $_SESSION['message'] . '</div>';
            echo '<script>
        setTimeout(function() {
            // Select all elements with class="message" and set their display style to "none"
            var messages = document.getElementsByClassName("message");
            for (var i = 0; i < messages.length; i++) {
                messages[i].style.display = "none";
            }
        }, 3000);
            </script>';
            // Unset the message so it is not displayed again on subsequent page loads
            unset($_SESSION['message']);
        }
        ?>
        <!-- CONTAINER -->
        <div id="container">
            <h1>Ajouter un produit</h1>
            <form action="traitement.php?action=add" method="post">
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
</main>