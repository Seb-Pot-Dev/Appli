<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminStyle.css">
    <title>Ajout produit en BDD</title>
</head>

<body>
    <main id="background">

        <?php
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
            <h1>Ajouter un produit dans ma BDD</h1>
            <form action="traitement.php?action=addProductToDatabase" method="post">
                <p class='form'>
                    <label>
                        Nom du produit :
                        <input type="text" name="name">
                    </label>
                </p>
                <p class='form'>
                    <label>
                        Prix :
                        <input type="number" name="price" >
                    </label>
                </p>
                <p class='form'>
                    <label>
                        Description :
                        <input type="text" name="description">
                    </label>
                </p>
                <p class='form'>
                    <label>
                        Url de l'image :
                        <input type="text" name="url" >
                    </label>
                </p>
                <p>
                    <input id="addProduct" type="submit" name="submit" value="Ajouter le produit en BDD">
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