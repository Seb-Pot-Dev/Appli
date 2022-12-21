# Appli
Création d'une application PHP permettant l'ajout de produits vers un panier.
L'utilisateur doit remplir un formulaire descriptif du produit avant de le soumettre (Nom, prix, quantité).
Les informations sont stockées dans la superglobale $_SESSION, et affichées dans un tableau récapitulatif.
Ce tableau est situé sur un fichier séparé (le panier), et différentes actions sont possible depuis celui-ci:
  Modifier la quantité (-/+)
  Supprimer un produit particulier.
  Supprimer tout les produits du panier.
