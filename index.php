<?php
// Vide le cache Poc
$cache = `rm poc*`;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>OpenRadio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="radio.png" />
  <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="./listStation.js"></script>
  <script src="./setStation.js"></script>
  <script src="./autoTitre.js"></script>
  <style>
  li {
    list-style-type:none;
    margin-bottom: 5px;
  }
  #listeR{
      background-color: #615a5a;
  }
  #player{
      background-color: #484646;
  }
  #attheme {
     background-color: #868484;
      display:none;
  }
  #titreM {
      padding-top:10px;
  }
  </style>

</head>
<body onLoad="setInterval(autoTitre, 10000);">

<div class="container-fluid">
<br/>
    <div class="row">
        <div class="col-sm-2" id="listeR">
        <!-- Liste des stations-->
      <!--  <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-primary" onClick="play('cl21')">Classic 21</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('abs80s')">Absolute 80s</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('gli')">Grand Lille Info</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('heart')">Heart 80s</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('rtl2')">RTL2</button></li>
        </ul>-->
        </div>
        <div class="col-sm-10" id="player">
        <!-- Partie Player -- Titre -->
            <center>
            <h2>Lecture en cours :</h2>
            <img id="logostation" src="https://www.radioplayer.co.uk/_img/logo-header.png" style="width:15%;">
            <h3 id="station">Stoppée (Aucune Radio en Lecture)</h3>
            <h4 id="titre"> - </h4>
            <audio controls id="playeur" src=""></audio>

           



            </center>
        </div>
        <div class="col-sm-2">
</div>
        <div class="col-sm-8" id="attheme">
        <div id="titleInfo">
<img id="pochette" src="https://cdn.absoluteradio.co.uk/artists/1-1/320x320/0.jpg" style="width: 10%; heigth: 10%;float:left; padding-top: 10px; margin-bottom: 10px; padding-right:10px;">
<p id="titreM" style="font-weight: bold;">Titre</p>
<p id="artist">Artiste</p>
</div>
</div>
    </div>
</div>
<!--<div style="margin-left:25%; margin-right:25%;">

</div>-->
<script type="text/javascript">
 lect = document.getElementById('playeur');
 logos = document.getElementById('logostation');
 station = document.getElementById('station');
 titre=document.getElementById('titre');
setbutton('home');
  </script>
</body>
</html>
