<?php
$db = new PDO('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', 'paris');
// $db est un objet de type PDO, il contient des propriétés et des methodes permettant d'interagir avec la database
//var_dump($db);

// -> query();
$sql = 'SELECT * FROM apprenants';
//$db -> query($sql);

//fetch
foreach($db->query($sql) as $s) {
  echo '<p>' . $s['name'] . '</p>';
  echo '<p>' . $s['surname'] . '</p>';
}
?>
