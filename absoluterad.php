<?php
function getdatas($lien){
    $donnees = file_get_contents($lien);
    $z1=explode('flexslide-item-0">',$donnees);
    $z1=explode("</li>",$z1[1]);
    $urlpoc=explode('<img src="',$z1[0]);
    $urlpoc=explode('"',$urlpoc[1]);
    $deux=$urlpoc;
    $urlpoc=$urlpoc[0];
    $titre=str_replace("<p>","",$deux[5]);
    $titre=str_replace("</p>","",$titre);
    $titre=str_replace(">:","",$titre);
    $titre=str_replace(" </span></i>","",$titre);
    $titre=str_replace("  ","",$titre);
    $titre=str_replace("\n","",$titre);
    $titre=str_replace("</a>","",$titre);
    $artist=$deux[2];
    $titre=str_replace("by ".$artist,"",$titre);
    //echo strpos($titre, ">");
    // preg_match('/>/i',$titre)
    //$default = 0;
    if (preg_match('/>/i',$titre)) {
        $donnees = file_get_contents($lien);
        $z1=explode('flexslide-item-1">',$donnees);
        $z1=explode("</li>",$z1[1]);
        $urlpoc=explode('<img src="',$z1[0]);
        $urlpoc=explode('"',$urlpoc[1]);
        $deux=$urlpoc;
        $urlpoc=$urlpoc[0];
        $titre=str_replace("<p>","",$deux[5]);
        $titre=str_replace("</p>","",$titre);
        $titre=str_replace(">:","",$titre);
        $titre=str_replace(" </span></i>","",$titre);
        $titre=str_replace("  ","",$titre);
        $titre=str_replace("\n","",$titre);
        $titre=str_replace("</a>","",$titre);
        $artist=$deux[2];
        $titre=str_replace("by ".$artist,"",$titre);
        //$default= $default -1;
    } 
    $urlpoc=str_replace("320x320","640x640",$urlpoc);
    return [$urlpoc, $artist, $titre];
}

?>