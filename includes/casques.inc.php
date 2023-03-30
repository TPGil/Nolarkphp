<?php

$cnx = new PDO('mysql:host=127.0.0.1;dbname=nolark', 'nolarkuser', 'nolarkpwd');

$fichier = basename($_SERVER['PHP_SELF']);

if ($fichier == 'route.php') {
    // Si on est sur la page "route.php", on récupère seulement les casques de type 4
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 4';
} else if ($fichier == 'piste.php') {
    // Si on est sur la page "route.php", on récupère seulement les casques de type 4
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 3';
} else if ($fichier == 'enfants.php') {
    // Si on est sur la page "route.php", on récupère seulement les casques de type 4
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 2';
} else if ($fichier == 'cross.php') {
    // Si on est sur la page "route.php", on récupère seulement les casques de type 4
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 1';
}

$res = $cnx->query($req);

echo '<section id="casques">';

while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
    echo '<article id="casques">';
    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
    '" alt="', $ligne->modele,'" id="img">';
    echo '<p class="prix">',$ligne->prix, '€','</p>','<p class="',afficheStock($ligne->stock),'">',$ligne->stock,'</p>','<p class="marque">', $ligne->nom,'</p>','<p class="modele">', $ligne->modele,'</p>','<p class="classement',$ligne->classement,'">', $ligne->classement,'</p>';
    echo '</article>';
}


function afficheStock($stock) {
    if ($stock > 0) {
        return 'stockok';
    }
    else {
        return 'stockko';
    }
    
}


echo '</section>';


//<?php //
//
///*
// * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
// * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
// */
//
//$cnx = new PDO('mysql:host=127.0.0.1;dbname=nolark', 'nolarkuser', 'nolarkpwd');
//$req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
//$req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
//$req .= ' INNER JOIN marque ON casque.marque=marque.id';
//$res = $cnx->query($req);
//echo '<section id="casques">';
//
//$fichier=__FILE__;
////if(fichier=='route.php'){
//    
//while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
//    echo '<article>';
//    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
//    '" alt="', $ligne->modele, '">';
//    echo $ligne->prix , $ligne ->stock,'<br>', $ligne->nom, '<br>', $ligne->modele, '<br> </t>', $ligne->classement;
//    echo '</article>';
//}
//echo '</section>';







//}

//while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
//    echo '<article>';
//    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
//    '" alt="', $ligne->modele, '/', $ligne->libelle, '/', $ligne->libelle, '">';
//    echo '</article>';
//    echo '<p>', $ligne->libelle, '</p>'; // Ajout pour afficher la marque
//}
//echo '</section>';