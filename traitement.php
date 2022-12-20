<?php
session_start();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

switch ($_GET["action"]) {
    case "add": //Add a product

        // Collect the data from the form (isset verify if $_POST['submit'] exist AND is not "Null".)
        if (isset($_POST['submit'])) {

            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //FILTER_SANITIZE_FULL_SPECIAL_CHARS(FILTER_SANITIZE_STRING is deprecated). It removes any special chars or HTMLcode. Security: no html injection possible.
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_VALIDATE_FLOAT validate the input only if its a Float. FILTER_FLAG_ALLOW_FRACTION does allow chars "," or "." for the decimals.
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // FILTER_VALIDATE_INT = validate only if the input is an Integer different from 0 (wich is consider as Null)

            /*
        Verify if the 3 filter did worked. No need to compare each variable with anything, because PHP will just checked if they are something positive (as string, int etc...)
        If filter did fail, they will return smth as "False" or "Null", then this If function will not work
        */
            if ($name && $price && $qtt) {
                //FIRST
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price * $qtt
                ];
                //SECOND
                $_SESSION['products'][] = $product;

                //THIRD
                $qttTotal = 0;
                if (isset($_SESSION['products']) || empty($_SESSION['products'])) {
                    $_SESSION['qttTotal'] += $qtt;
                }
                //SET A SUCCESS MESSAGE
                $_SESSION['message'] = "<p class='succes'>Produit ajouter au panier avec succès.<p>";
            } else {
                //SET AN ERROR MESSAGE
                $_SESSION['message'] = "<p class='error'>Il y a eu une erreur lors de l'ajout du produit. Recommencez s'il vous plait.";
            }
            /*
        FIRST : We create for each product, an associative array "$product"

        /SECOND : We indicate the session array "$_SESSION" with the 'products' key. If the 'product' key was not created before (when a first article added by the client for exemple), it will create a new one.
        The 2 hooks [] is a shortcut wich indicate that we do add an element to the futur 'products' array.
        $_SESSION['products'] as to be an array too, so we can add new element later.
            
        THIRD : If the $_SESSION['qttTotal'] variable is set,  the $qtt value is added
        */
        }
        header("Location:index.php");
        break;

        //increment a product qtt
    case "addQtt":
        if (isset($_SESSION["products"])) {
            $_SESSION["products"][$id]["qtt"]++;
            $_SESSION["products"][$id]["total"] += $_SESSION["products"][$id]["price"];

            header("Location: recap.php");
        }
        break;
        //decrement a product qtt
    case "minusQtt":
        if (isset($_SESSION['products']) && $_SESSION["products"][$id]["qtt"] == 1) {
            unset($_SESSION['products'][$id]);
            header("Location:recap.php");
        } elseif (isset($_SESSION['products'])) {
            $_SESSION["products"][$id]["qtt"]--;
            $_SESSION["products"][$id]["total"] -= $_SESSION["products"][$id]["price"];
            header("Location: recap.php");
        }
        break;

        //remove all products from basket
    case "deleteBasket":
        unset($_SESSION['products']);
        header("index:recap.php");
        break;
}
