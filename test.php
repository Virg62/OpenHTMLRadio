<?php
//include 'absoluterad.php';
$titAv='';
$urlpoc="";
$titre="";
$artist="";
$tosend="";
$nbimg=0;



// url horizon 'api'
// https://www.horizonradio.fr/player/refresh_header.php
$dt = file_get_contents("https://www.horizonradio.fr/player/refresh_header.php");
$titre = explode("</span>",explode('<span class="header_titre lefty">',$dt)[1])[0];
$artist = explode("</span><br>",explode('<span class="header_artiste lefty">',$dt)[1])[0];
$tosend = $artist . " - " . $titre;
$titAv = "True";
$urlpoc = "https://www.horizonradio.fr/". explode('"',explode('<img src="',$dt)[1])[0];




    echo '{
       "tit":"'.$tosend.'",
      "titAvail":"'.$titAv.'",
      "titre":"'.$titre.'",
     "artist":"'.$artist.'",
     "pochetteURL":"'.$urlpoc.'",
     "nbimg":"'.$nbimg.'"
  }';


?>
