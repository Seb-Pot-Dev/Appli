# Appli
Création d'une application PHP permettant l'ajout de produits vers un panier.
L'utilisateur doit remplir un formulaire descriptif du produit avant de le soumettre (Nom, prix, quantité).
Les informations sont stockées dans la superglobale $_SESSION, et affichées dans un tableau récapitulatif.
Ce tableau est situé sur un fichier séparé (le panier), et différentes actions sont possible depuis celui-ci:
  Modifier la quantité (-/+)
  Supprimer un produit particulier.
  Supprimer tout les produits du panier.

Détail des scripts : 
Le script index.php est une page HTML qui affiche un formulaire permettant à l'utilisateur de saisir les informations d'un produit à ajouter au panier. Lorsque l'utilisateur soumet le formulaire, les données sont envoyées au script traitement.php via une requête HTTP de type POST.

Le script traitement.php est un script PHP qui traite les actions du panier d'achat, comme ajouter, modifier ou supprimer des produits. Lorsqu'il reçoit une requête HTTP de type POST avec les données d'un nouveau produit, il valide et nettoie ces données, puis les ajoute au panier en utilisant des variables de session.

Le script recap.php est une page HTML qui affiche un résumé du contenu du panier d'achat, avec la liste des produits et leur quantité totale. Elle permet également à l'utilisateur de modifier la quantité de chaque produit ou de les supprimer du panier. Lorsque l'utilisateur modifie la quantité d'un produit ou le supprime du panier, la page envoie une requête HTTP de type GET au script traitement.php avec l'action à effectuer et l'identifiant du produit concerné. Le script traitement.php exécute l'action demandée et met à jour les données du panier en utilisant des variables de session.
