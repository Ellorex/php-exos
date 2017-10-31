<?php
ini_set('display_errors',1)// 1 : affiche les notices et erreurs
 ?>

<?php


$v = "bonjour";
echo $v;
$v = 14;
echo $v;

//opérations sur integer
$nb1 = 45;
$nb2 = 2;
echo $nb1 * $nb2;

$str1 = "Un tiens vaut mieux";
$str2 = "que deux tu l'auras";
echo "<h2>" . $str1 . " " . $str2 . "</h2>"; //concaténation


//TYPES COMMPLEXES
// 1- tableaux à indice numérique (commence à 0)
$tableau = [];
echo gettype ($tableau);
$tableau2 = array();
echo gettype ($tableau2);

$etudiants = ["étudiant1", "étudiant2", "étudiant3"];
echo $etudiants[2]; // affiche étudiant3
$etudiants[0] = "Samir"; // accès en écriture aux éléments du tableau
echo $etudiants[0]; // affiche session_cache_limiter

$mix = ["chaîne", 45, false, NULL, $etudiants]; //plusieurs types de variables peuvent cohabiter au sein de la même structure, on peut avoir un tableau dans un tableau
echo $mix[4][0]; // affiche le premier élément 4e element

// 2- tableaux associatifs

$joueurs = array(
  'joueur1' => array(
    'nom' => 'Messi',
    'prenom' => 'Lionel',
    'maillot' => 10
  )
);
echo "<br>";
echo $joueurs['joueur1']['prenom'];
echo " ";
echo $joueurs['joueur1']['nom'];

$j1 = array('prenom' => 'Paolo', 'nom' => 'Dybala', 'maillot' => 10);
$j2 = array('prenom' => 'Giorgio', 'nom' => 'Chiellini', 'maillot' => 3);
$j3 = array('prenom' => 'Andrea', 'nom' => 'Barzagli', 'maillot' => 15);

$juve = array($j1, $j2, $j3);

//Deux manières de modifier un élément - à retravailler, ne fonctionnent pas

$j1['maillot'] = 21; //changement local
$juve[0]['maillot'] = 21; //change sur tout le fichier
$juve[0]['prenom'] = 'Paulo';
echo $j1['prenom'];
echo ' ';
echo $j1['maillot'];

// 3- Structures itératives
// Boucle for

for($i=0; $i<sizeof($juve); $i++) {
  echo '<li>' . $juve[$i]['prenom'] . ' ' . $juve[$i]['nom'] . '</li>';
}
echo '</ul>';

// boucle while

echo '<select>';
$compteur = 0;
while ($compteur < sizeof($juve)) {
  echo '<option>' . $juve[$compteur]['maillot'] . '</option>';
  $compteur++;
}
echo '</select>';

foreach($juve as $j) {
  if ($j['maillot'] == 21) {
    echo "<p style='color:green'>" . $j['nom'] . ' meneur de jeu</p>';
  } else {
    echo '<p>' . $j['nom'] . '</p>';
  }
}

 ?>
