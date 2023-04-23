<?php 

require_once("autoload.php");

$sBasepath=getcwd().'/';   // Chemin de la base de l'application avec un slash final

$eleve = new EleveModel();

$eleve->id_promotion = 1;
$eleve->id_photo = 42;
$eleve->nom = "toto";
$eleve->prenom = "toto";
$eleve->email = "toto@toto.fr";
$eleve->mdp = "mot_passe";
$eleve->actif = 0;

//$eleve->nom = "toto";

$eleve->create();
//print_r($eleve->toArray());

$tab = $eleve->index();
print_r($tab);
