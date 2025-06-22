<?php
    session_start();
    include_once "$racine/modele/authentification.php";

     // creation du menu burger
     $menuBurger = array();
     $menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
     $menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");
      
     // recuperation des donnees GET, POST, et SESSION

     // traitement si necessaire des donnees recuperees
     if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
         // Cas 1 : On affiche le formulaire de connexion
         
         $titre = "Authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueAuthentification.php";
        include "$racine/vue/pied.html.php";
     }
     else
     {
         // Appel de la fonction login()
         
         login($_POST["mailU"], $_POST["mdpU"]);

         if (isLoggedOn()){
              // Cas 2 : L'utilisateur est connecté, on affiche la confirmation
              $titre = "Confirmation";
              include "$racine/vue/entete.html.php";
              include "$racine/vue/vueConfirmation.php";
              include "$racine/vue/pied.html.php";

         }
         else
         {
              // Cas 3 : L'utilisateur n'est pas connecté, on affiche le formulaire de connexion
              $titre = "Authentification";
               include "$racine/vue/entete.html.php";
               include "$racine/vue/vueAuthentification.php";
               include "$racine/vue/pied.html.php";
         }
        }
 ?>
 