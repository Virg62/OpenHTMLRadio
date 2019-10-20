<?php


function gli() {


$tosend = "";
$titre = "";
$artist = "";
$urlpoc = "";

$rep=file_get_contents("http://www.creacast.net/get_title.php?mode=raw&usr=grandlilleinfos&utf8_decode=1");
$testeuh= explode(" - ",$rep);

$artist=$testeuh[0];
$titre=$testeuh[1];

$pdo = new PDO('mysql:dbname=gliapi;host=localhost', 'admin', 'virgilemysql');
$query = $pdo->prepare("SELECT * FROM titres where Titre = ? AND Artiste = ?");
	// execute it with the posted params
	$query->execute([
        $titre,
        $artist
	]);



    foreach ($query as $row) {
        $urlpoc = $row['URLPoc'];
    }

    $tosend = $artist . " - " . $titre;

    $retour = [$artist, $titre, $tosend, $urlpoc];


   // print_r($retour);
    return $retour;

}



?>