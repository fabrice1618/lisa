<?php 

require_once("autoload.php");

$sBasepath=getcwd().'/';   // Chemin de la base de l'application avec un slash final

$promo = new PromotionModel();

$promo->nom = "toto";

$promo->create();
print_r($promo->toArray());

$tab = $promo->index();
print_r($tab);
