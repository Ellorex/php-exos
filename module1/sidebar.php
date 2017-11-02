<?php
include_once('datasource.php');
include_once('lib.functions.php');
$apprenants = listApprenants();?>

<p>huehe</p>


<?php
        $bestApprenant = getBestAverage();
        foreach($bestApprenant as $b) {
          echo '<ul>';
          echo '<li>' . $b['apprenants']['nom'] . $b['apprenants']['prenom'] . " (" . ")" .'</li>';
          // echo '<li>' . . '</li>';
          echo '</ul>';}
        
 ?>

<!--foreach($apprenants as $a) {
  $getAverage = getAverage($a['notes']);
  echo '<tr>';
  echo '<td>' . firstCap($a['prenom']) . '</td>';
  echo '<td><a href="apprenant_details.php?id='.$a['id'].'">' . firstCap($a['nom']) . '</a></td>';
  echo '<td><img src="'.ASSETS_PATH.'img/totem/' . $a['totem'] . ' " alt="totem de l\'apprenant"/> </td>';
    // echo '<td>' . end($a['notes']) . '</td>';
  echo '<td>' . getLastGrade($a['notes']) . '</td>';
