<?
$cv = array(
    'nom' => 'Maurice',
    'date_naissance' => '1985-12-10',
    'adresse' => '1, rue des fleurs 31500 Toulouse',
    'tel' => '0666666666',
    'photo' => 'julien.jpg',
    'metier' => 'Développeur web',
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
?>
<? foreach($cv as $item=>$infos){?>
    <h2><?= ?></h2>
<?}
?>