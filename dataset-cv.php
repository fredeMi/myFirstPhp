<?
$cv = array(
    'nom' => 'Maurice',
    'date_naissance' => '2000-12-10',
    'adresse' => 'La Cantine 31000 Toulouse',
    'tel' => '03131313131',
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
  <p>age</p>
  <p><?= $cv['adresse'] ?></p>
  <p><?= $cv['tel'] ?></p>
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
    <td><?= $note ?></td>
  </tr>
  <?}?>
</table>