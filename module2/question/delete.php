<?php
//Suppression de la question liée à l'id
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = $db->prepare('DELETE FROM question WHERE id = :id');

  $result = $query->execute(array(
    ':id' => intval($id)
  ));
  if ($result) {
    // en cas de succès, redirection vers la liste des questions
    header('location:?route=question/list');
  } else {
    echo '<p>Suppression impossible</p>';
}}
?>
