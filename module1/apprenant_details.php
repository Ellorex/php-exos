<?php
include('lib/functions.php');
include('datasource.php');
include('header.php');


if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $apprenant = apprenantParId($id);
// var_dump($apprenant); //affiche infos sur la variable

  if($apprenant) {
    echo displayDetails($apprenant);
  } else {
    echo 'Apprenant non trouvé';
  }

} else {
  echo 'Paramètre "id" manquant';
}

?>


<?php
include('footer.php'); ?>
