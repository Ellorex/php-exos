<?php
//include('../header.php');

//il existe une built in function pour capitalize mais on peut faire sans :
function firstCap ($str) {
  $firstLetter = $str[0];
  $rest = substr($str, 1);
  $firstCap = strtoupper($firstLetter);
  $staylow = strtolower($rest);
  return $firstCap . $staylow;
}

//afficher la dernière note obtenue dans le tableau
function getLastGrade ($grades) {
  //renvoie la dernière note si le tableau n'est pas vide
  // renvoie "aucune note" si le tableau est vide
  $nb_grades = sizeof($grades);
  if ($nb_grades == 0){
    return NO_GRADE_MSG;
  } else {
    return $grades[$nb_grades - 1];
  }
}

function getAverage ($grades) {
  $sumGrades = 0;
  $nb_grades = sizeof($grades);
  if ($nb_grades == 0){
    return NO_GRADE_MSG;
  }
  if ($nb_grades == 1) {
    return $grades[0];
  }
  foreach($grades as $grade) {
    $sumGrades += $grade; //équivalent à $sumGrades = $sumGrades + $note
  }
  return round($sumGrades / $nb_grades, 2);
}

function displayDetails($apprenant) {
  $output = '';
  $output .= '<div class="stagiaire">';
  $output .= '<h2>'.$apprenant['nom'].'</h2>';
  $output .= '<img src="'.ASSETS_PATH.'img/totem/'.$apprenant['totem'].'" alt=""/>';
  $output .= '</div>';
  return $output;
}

function getBestAverage($apprenants){
  $tmp = array();
  for($i = 0; $i < sizeof($apprenants); $i++) {
    $tmp[$i] = array();
    $tmp[$i]['notes'] = getAverage($apprenants[$i]['notes']);
    $tmp[$i]['id'] = $apprenants[$i]['id'];

    //array_push($tmp, $apprenants[$i]['id']);
    //array_push($tmp, getAverage($apprenants[$i]['notes']));
  }

  arsort($tmp);
  $tmp = array_slice($tmp, 0, 3);

  return $tmp;
}
?>
