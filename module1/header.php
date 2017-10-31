<?php
include('config.php');
//include('datasource.php');
//include('lib/functions.php');

//$apprenants = listApprenants();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH . 'css/style.css' ?>">
  </head>
  <body>
    <h1>Formation PHP</h1>
<nav>
  <ul class="nav nav-tabs"> <!-- pour que le menu soit horizontal -->
    <li><a href="index.php">Accueil</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</nav>


<!-- <div class="row">
  <div class="col-md-3 col-md-offset-3">
    <table>
      -->
        <!-- // $bestApprenant = getBestAverage();
        // foreach($bestApprenant as $b) {
        //   echo '<tr>';
        //   echo '<td>' .  . '</td>';
        //   echo '<td>' . . '</td>';
        //   echo '</tr>';}
        //echo $tmp;

      // --> 
    <!-- </table>

  </div>

</div> -->
<!--foreach($apprenants as $a) {
  $getAverage = getAverage($a['notes']);
  echo '<tr>';
  echo '<td>' . firstCap($a['prenom']) . '</td>';
  echo '<td><a href="apprenant_details.php?id='.$a['id'].'">' . firstCap($a['nom']) . '</a></td>';
  echo '<td><img src="'.ASSETS_PATH.'img/totem/' . $a['totem'] . ' " alt="totem de l\'apprenant"/> </td>';
    // echo '<td>' . end($a['notes']) . '</td>';
  echo '<td>' . getLastGrade($a['notes']) . '</td>';
