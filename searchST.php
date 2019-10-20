<?php
// Init de la BD
if (isset($_GET['nom']) && $_GET['nom'] != "") {
    $vac=$_GET['nom'];
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'userbdd', 'passwdbdd');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    echo '{';
        if (isset($_GET['n']) && $_GET['n'] == "exact") {
            $reponse = $bdd->prepare('SELECT * FROM radio WHERE pnom LIKE ?');
            $reponse->execute([
                $_GET["nom"]
            ]);



        } else {
            if ($_GET['nom']=="*") {
                $reponse = $bdd->query('SELECT * FROM radio');
            } else {
    $reponse = $bdd->prepare('SELECT * FROM radio WHERE nom LIKE ?');
    $reponse->execute([
        "%".$vac."%"
    ]);


        }}
    while ($donnees = $reponse->fetch()) {
       // echo '"'.$donnees['nom'].'":['."'".$donnees['lnk']."','".$donnees['slogan']."','".$donnees['image']."']".'"'.",";
        echo '"'.$donnees['nom'].'":["'.$donnees['lnk'].'","'.$donnees['slogan'].'","'.$donnees['image'].'","'.$donnees['nom'].'","'.$donnees['pnom'].'"],';
    }
echo '"neant":""}';

} else {
}
?>
