<?php
    include_once "$racine/modele/bd.resto.php";
    include_once "$racine/modele/bd.photo.php";
    include_once "$racine/modele/bd.typeCuisine.php";

     
    // creation du menu burger
    $menuBurger = array();
    $menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
    $menuBurger[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
    $menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");
     
    // recuperation des donnees GET, POST, et SESSION
         // on récupère le critère en GET dans l'URL (critere de recherche par defaut : nom) : $critere
        
        $critere=$_GET['critere']?? 'nom';        
        
         // on récupère les variables des formulaires : $nomR, $villeR, $cpR, $voieAdrR, $tabIdTC[]  
         $nomR=$_POST['nom']?? '';
         $voieAdrR=$_POST['rue']??'' ;
         $villeR=$_POST['ville']??'' ;
         $cpR=$_POST['codePostal']??'' ;


         $tabIdTC=$_POST['typeR']?? [];
     
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
         // on appelle les fonctions utiles en fonction du type de recherche
        
         switch($critere){
              case 'nom':
              // recherche par nom
              $lesRestos=getLesRestosByNoms($nomR);
              break;
              case 'adresse':
              // recherche par adresse
              $lesRestos=getLesRestosByAdresse($voieAdrR,$cpR,$villeR);
              break;
              case 'type':
              // recherche par type de cuisine
              $lesRestos=getLesRestosByTC($tabIdTC);
              break;

          }
     
    // traitement si necessaire des donnees recuperees
    ;
     
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Recherche d'un restaurant";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueRechercheResto.php";
    if (!empty($_POST)) {
        // affichage des résultats de la recherche
        include "$racine/vue/vueListeRestos.php";
    }
    include "$racine/vue/pied.html.php";
    ?>

