<?php
include('lib/functions.php');
ini_set('display_errors', 1);
include('datasource.php');

$title = "Formation PHP";
$apprenants = listApprenants();
echo "<pre>";
var_dump(getBestAverage($apprenants));
echo "</pre>";
?>

  <?php

include('header.php');
?>

<h2>Liste des apprenants</h2>
<!--
<div class="row">
<div class="col-md-9">



<table class="table table-striped-dark table-bordered">
  <tr>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Totem</th>
    <th>Dernière note</th>
    <th>Moyenne</th>
  </tr> -->

  <?php
  /*foreach($apprenants as $a) {
    $getAverage = getAverage($a['notes']);
    echo '<tr>';
    echo '<td>' . firstCap($a['prenom']) . '</td>';
    echo '<td><a href="apprenant_details.php?id='.$a['id'].'">' . firstCap($a['nom']) . '</a></td>';
    echo '<td><img src="'.ASSETS_PATH.'img/totem/' . $a['totem'] . ' " alt="totem de l\'apprenant"/> </td>';
      // echo '<td>' . end($a['notes']) . '</td>';
    echo '<td>' . getLastGrade($a['notes']) . '</td>';
    if($getAverage < 10 && $getAverage != NO_GRADE_MSG) {
      echo '<td style="color:red">' . $getAverage . '</td>';
    }
    else {
      echo '<td>' . $getAverage . '</td>';
    }
    echo '</tr>';
  }*/
  ?>
<!-- </table>
</div>
</div> -->
</body>
</html>
