<h1>Liste des restaurants</h1>
<?php
foreach($lesRestos as $unResto){
    $laPhoto = getLaPhotoByIdResto($unResto->idR);
    $typesCuisines = getLesTypesCuisinesbyIdR($unResto->idR);


echo "<div class='card'>
    <div class='photoCard'>
    <img src='photos/$laPhoto->cheminP' alt='photo du restaurant'>
    </div>
    <a href='./?action=detail&resto=$unResto->idR'> $unResto->nomR </a>";

    foreach($typesCuisines as $unTypeCuisine){
        echo "<div class='tagCard'>
                <ul id='tagFood'>
                    <li class='tag'><span class='tag'># $unTypeCuisine->libelleTC</span></li>
        </ul>
    </div>";
    }
echo"
</div>";
}
?>