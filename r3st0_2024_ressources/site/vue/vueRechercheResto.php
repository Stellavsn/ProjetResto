<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php

   switch ($critere){
      case "nom":
         echo "Recherche par nom :";
         echo "<input type='text' name='nom' placeholder='Entrez le nom du restaurant'>";
         break;

      case "adresse":
         echo "Recherche par adresse :";
         echo "<input type='text' name='ville' placeholder='Ville'>";
         echo "<input type='text' name='codePostal' placeholder='Code Postal'>";
         echo "<input type='text' name='rue' placeholder='Rue'>";
         break;
         
      case "type":
         $typesCuisines=getLesTypesCuisines();
         echo "Recherche par type de cuisine :";
         foreach($typesCuisines as $unTypeCuisine){
            echo "<input type='checkbox' name='typeR[]' value='$unTypeCuisine->idTC'>$unTypeCuisine->libelleTC ";
         }
         break;
   }
?>
   <input type="submit" value="Rechercher" />
</form>