<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Faux CV débuts php</title>
    <meta name="description" content="2nd jour de php"/> 
    <style>
      body{
        font-size: 15px;
        font-weight: bold;
        color: rgb(120, 100, 150);
      }
      h2{
        text-decoration: underline;
      }
      table, th{
        border: 1px solid black;
        text-align: left;
        padding: 3px;
      }
    </style>
</head>
<body>
<?
$cv = array(
    'nom' => 'Mauricette',
    'date_naissance' => '1979-06-10',
    'adresse' => 'Quai des savoirs 31400 Toulouse',
    'tel' => '0531313131',
    'photo' => 'maurice.jpg',
    'metier' => 'As of the jungle developper',
    'diplomes' => array(
      'Baccalauréat - Lycée Pierre et Marie Curie' => 2004,
      'BTS - Greta Montpellier' => 2008,
      'Licence - Université de Toulouse Paul Sabatier' => 2010,
      'Master - Université de Toulouse Paul Sabatier' => 2013
    ),
    'experiences' => array(
      array(
        'libelle' => "Job d'été (serveur)",
        'debut' => '2002-06-01',
        'fin' => '2002-09-01'
      ),
      array(
        'libelle' => "Stage service informatique chez EDF",
        'debut' => '2008-03-01',
        'fin' => '2008-10-01'
      ),
      array(
        'libelle' => "Développeur web chez Google",
        'debut' => '2013-10-01',
        'fin' => 'now'
      )
    ),
    'competences' => array(
      'html' => 4,
      'css' => 3,
      'javascript' => 5,
      'php' => 3
    )
);
setlocale(LC_TIME, "fr_FR", "French");
function formatDate($aDate){
  return strftime("%d %B %G", strtotime($aDate));
}
?>
<div>
  <h1><?= $cv['nom'] ?> - <?= $cv['metier'] ?></h1>
  <img src="img/<?= $cv['photo'] ?>" width=250 alt="<?= $cv['nom'] ?>">
  <?function calculAge($birthDate){
    $time = strtotime($birthDate);
    if($time === false){
      return '';
    }
    $year_diff = '';
    $date = date('d-m-Y', $time);
    list($day,$month,$year) = explode('-',$date);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0)$year_diff--;
    return $year_diff;
}
  ?>
  <p><?= calculAge($cv['date_naissance'])?> ans</p>
  <p><?= $cv['adresse'] ?></p>
  <p>
  <? $arrayTel = str_split($cv['tel'],2);
    foreach($arrayTel as $k=>$num){
      $tel=($k<4)?"$num-":"$num";
      echo $tel;
    }
  ?>
  </p>
</div>
<h2>Diplômes</h2>
<ul>
  <? arsort($cv['diplomes']);
  foreach($cv['diplomes'] as $place=>$year){?>
  <li><?= $year ?> : <?= $place ?></li>
  <?}?>
</ul>
<h2>Expériences</h2>
<ul>
  <?
  $experiences=array_reverse($cv['experiences']);
  foreach($experiences as $experience=>$info){
    $dateDebut=formatDate($info['debut']);
    $dateFin=($info['fin']=='now')?'<b>à maintenant</b>':'au '.formatDate($info['fin']);
    echo "<li>$dateDebut $dateFin: ".$info['libelle']."</li>";
  }?>
</ul>
<h2>Compétences</h2>
<table>
  <?foreach($cv['competences'] as $language=>$note){?>
  <tr>
    <th><?= $language ?></th>
    <? for($i=1;$i<=5;$i++){
        if ($i<=$note){
          echo '<td><img src="img/filled-star.svg"></td>';
        }
        else echo '<td><img src="img/emptied-star.svg"></td>';
    }
    ?>
  </tr>
  <?}?>
</table>
</body>