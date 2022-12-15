<?php
session_start();

if (isset($_POST['submit'])) { // isset determine if a variable has been declared AND is not "Null".

    /* 
"filer_input" is used to valide/clean data from forms using different filters as argument.
It returns the sanitized Value, 
or False if the filter fails, 
or Null if the form doesnt exist in the POST request
*/
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //FILTER_SANITIZE_FULL_SPECIAL_CHARS(FILTER_SANITIZE_STRING is deprecated). It removes any special chars or HTMLcode. Security: no html injection possible.
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_VALIDATE_FLOAT validate the input only if its a Float. FILTER_FLAG_ALLOW_FRACTION does allow chars "," or "." for the decimals.
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // FILTER_VALIDATE_INT = validate only if the input is an Integer different from 0 (wich is consider as Null)

    if ($name && $price && $qtt) {

        /*
This If function verify if the 3 filter did worked. No need to compare each variable with anything, because PHP will just checked if they are something positive (as string, int etc...)
If filter did fail, they will return smth as "False" or "Null", then this If function will not work
*/
        //FIRST
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];
        //SECOND
        $_SESSION['products'][] = $product;

        /*
FIRST : We create for each product, an associative array "$product"

SECOND : We indicate the session array "$_SESSION" with the 'products' key. If the 'product' key was not created before (when a first article added by the client for exemple), it will create a new one.
The 2 hooks [] is a shortcut wich indicate that we do add an element to the futur 'products' array.
$_SESSION['products'] as to be an array too, so we can add new element later.
*/
    }
}

header("Location:index.php");
