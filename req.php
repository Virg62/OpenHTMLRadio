<?php
//echo $_GET['rad'];
// Pour éviter des problèmes de 'undefined':
include 'absoluterad.php';
include 'autreDABbel.php';
include 'unionjack.php';
include 'gliapi.php';


$titAv='False';
$urlpoc="";
$titre="";
$artist="";
$tosend="";
$nbimg=0;
$radio = $_GET['rad'];
if ($radio == 'cl21') {
    $lienjson = "http://np.maradio.be/qp/v3/events?callback=jQuery31105856060390700759_1544278105191&rpId=2&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1544278105194";
    
    $json = file_get_contents($lienjson);
    $json = str_replace("jQuery31105856060390700759_1544278105191","",$json);
    $json = str_replace("({","{",$json);
    $json = str_replace("})","}",$json);
    $obj = json_decode($json, true);
    //print_r($obj);
    //echo "<br/>";
    //print_r($obj['results']['now']);
    if (isset($obj['results']['now']['name'])) {
        $tosend= $obj['results']['now']['artistName']." - ".$obj['results']['now']['name'];
        
    $titre=$obj['results']['now']['name'];
    $artist=$obj['results']['now']['artistName'];
    $titAv="True";
    } else {
        $tosend= $obj['results']['now']['programmeName'];
        $titAv="False";
    }
    $urlpoc=$obj['results']['now']['imageUrl'];
} else if ($radio == 'gli') {

    // ICI L'ANCIENNE VERSION DU SCRIPT GRAND LILLE INFO ------------------------------------
//     $rep=file_get_contents("http://www.creacast.com/get_title.php?usr=grandlilleinfos&mode=raw");
//     $tosend = $rep;
//     $titAv="True";
//     $testeuh= explode(" - ",$tosend);
//     $artist=$testeuh[0];
//     $titre=$testeuh[1];
//     $getnbpoc=`ls poc*`;
//    if ($getnbpoc == "") {
//        $nbimg=0;
//    } else {
//        $tempo=explode("poc",$getnbpoc);
//        $tempo[1]=str_replace(".jpg","",$tempo[1]);
//        $nbimg=$tempo[1]+1;
//        $rm = `rm poc*`;

//    }
//    if ($artist !="GRAND LILLE INFO" && !isset($_GET['getpoc'])) {
//     $gettitre = `sacad "$artist" "$titre" 400 -v quiet poc$nbimg.jpg &`;
//    } else{
//        $gettitre=`cp gli.jpg poc$nbimg.jpg &`;
//    }
//   $urlpoc="./poc$nbimg.jpg";
    // --------------------------------------------------------------------------------------

    $rt = gli();
    $titAv = "True";
    $titre = $rt[1];
    $artist = $rt[0];
    $tosend = $rt[2];
    $urlpoc = $rt[3];




} else if ($radio == "virage") {
    $liendata="https://www.virageradio.com/winradio/prog.xml";
    $data=file_get_contents($liendata);
    $xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    //print_r($array);
    $dt=$array['morceau'][0];
    if ($dt['chanson'] != "La musique revient vite ...") { 
    $titre=$dt['chanson'];
    $artist=$dt['chanteur'];
    $urlpoc=$dt['pochette'];
    $tosend=$artist. " - ". $titre;
    $titAv="True";
    } else {
        $titAv="False";
        $tosend=$dt['chanson'];
    }
}else if ($radio == "chantefr") {
    $liendata="https://www.chantefrance.com/XML/morceaux_Chante_France_1563980820.xml";
    $data=file_get_contents($liendata);
    $xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    //print_r($array);
    $dt=$array['morceau'][0];
    $titre=$dt['titre'];
    $artist=$dt['artiste'];
    $urlpoc=$dt['pochette'];
    $tosend=$artist. " - ". $titre;
    $titAv="True";


} else if ($radio == "viva") {
    $lienjson = "http://np.maradio.be/qp/v3/events?callback=jQuery31108219233819576504_1546288575819&rpId=13&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1546288575826";
    
    $json = file_get_contents($lienjson);
    $json = str_replace("jQuery31108219233819576504_1546288575819","",$json);
    $json = str_replace("({","{",$json);
    $json = str_replace("})","}",$json);
    $obj = json_decode($json, true);
    //print_r($obj);
    //echo "<br/>";
    //print_r($obj['results']['now']);
    if (isset($obj['results']['now']['name'])) {
        $tosend= $obj['results']['now']['artistName']." - ".$obj['results']['now']['name'];
        
    $titre=$obj['results']['now']['name'];
    $artist=$obj['results']['now']['artistName'];
    $titAv="True";
    } else {
        $tosend= $obj['results']['now']['programmeName'];
        $titAv="False";
    }
    $urlpoc=$obj['results']['now']['imageUrl'];
} else if ($radio=="STADS") {
    $titAv="False";
    $tosend="De radio van jouw stad";
} else if ($radio == 'abs80s') {
    $lienutile="https://absoluteradio.co.uk/80s/";
    $donnee = getdatas($lienutile);
    $titre=$donnee[2];
    $artist=$donnee[1];
    $urlpoc=$donnee[0];
    $tosend=$artist." - ".$titre;
    $titAv="True";
} else if ($radio=="absCR") {
    // $lienjson = `python3 absCR.py json`;
    // $lienjson=preg_replace( "/\r|\n/", "", $lienjson);
    // $obj = json_decode(file_get_contents($lienjson),true);
    // $titre=$obj['eventSongTitle'];
    // $artist=$obj['eventSongArtist'];
    // $urlpoc=$obj['eventImageUrl'];
    // $titAv="True";
    // $tosend = $artist." - ".$titre;
    $lienutile="https://absoluteradio.co.uk/classic-rock/";
    $donnee = getdatas($lienutile);
    $titre=$donnee[2];
    $artist=$donnee[1];
    $urlpoc=$donnee[0];
    $tosend=$artist." - ".$titre;
    $titAv="True";
}else if ($radio == 'heart') {
   #$tosend= `python3 heart80s.py`;
   $mesnouvellesdonnees=`python3 Nheart80s.py`;
   $obj=json_decode($mesnouvellesdonnees,true);
   $titre=$obj['titre'];
   $artist=$obj['artist'];
   $urlpoc=$obj['urlpoc'];
   $tosend=$obj['artist']. " - ".$obj['titre'];
   
   $titAv="True";

   #$tosend="Hello World !";



} else if ($radio == 'horizon') {
    // $tosend= `python3 horizon.py`;
    // $titAv="False";
    $dt = file_get_contents("https://www.horizonradio.fr/player/refresh_header.php");
    $titre = explode("</span>",explode('<span class="header_titre lefty">',$dt)[1])[0];
    $artist = explode("</span><br>",explode('<span class="header_artiste lefty">',$dt)[1])[0];
    $tosend = $artist . " - " . $titre;
    $titAv = "True";
    $imgrl = explode('"',explode('<img src="',$dt)[1])[0];
    if (preg_match('/http/i',$imgrl)) {
        $urlpoc = $imgrl;
    } else {
        $urlpoc = "https://www.horizonradio.fr/". $imgrl ;
    }




} else if ($radio == 'plus') {
    $tosend= `python3 plus.py`;
    $titAv="False";
} else if ($radio == "lovely") {
    $lienjson = "https://radiolovely.fr/players/index/gettitrageplayer/idplayers/2174546520932614275";
    $data = file_get_contents($lienjson);
    $data = json_decode($data,true);
    $artist = $data['artist'];
    $titre = $data['title'];
    $tosend = $data['title_str'];
    $urlpoc = $data['image'];
    $titAv = "True";
}else if ($radio == 'rtl2') {
    $lienjson="https://www.rtl2.fr/direct/live-player-config.json";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json, true);
    $tosend = $obj['title'];
    $titAv="True";
    $titre=$obj['title'];
    $artist=$obj['desc'];
    $urlpoc=$obj["imageUrl"];

} else if ($radio == 'nostVL') {
    $lienjson="http://www.nostalgie.eu/utils/currentitlewebradio/76";
    $json = file_get_contents($lienjson);
    $obj=json_decode($json, true);
    $titre=$obj['titre'];
    $artist=$obj['artiste'];
    $urlpoc="http://www.nostalgie.eu/utils/covers/".$obj['data']."/400";
    $tosend= `python3 nostVL.py`;

    $titAv="True";
} else if ($radio == "banquise") {
    $lientit="http://94.23.21.126:10050/currentsong?sid=1";$
    $data = file_get_contents($lientit);
    if ($data == "") {
        $data = "Fresh Music !";
    }
    $tosend= $data;
    $titAv="False";

} else if ($radio == 'ouifm') {
    $lienjson="http://player.ouifm.fr/api/songs";
    $json = json_decode(file_get_contents($lienjson),true);
    $data=$json['rock'][0];
    $artist=$data['artist'];
    $titre=$data['title'];
    $titAv="True";
    $tosend=$artist. " - ".$titre;
    $urlpoc=$data['img_sqr'];

}else if ($radio == 'joe') {
    $lienjson="https://api.joe.be/2.4/tracks/plays?limit=1";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $object = (array)$obj;
    $object = (array)$object['played_tracks'];
    $object = (array)$object[0];
    $titre = $object['title'];
    $artist = (array)$object['artist'];
    $artist = $artist['name'];
    $tosend = $artist . " - ".$titre;
    //print_r($at);
    $titAv="True";
    $urlpoc="https://api-80s.joe.be".$object['thumbnail'];
}else if ($radio == 'willy') {
    $lienjson="https://api.willy.radio/2.4/tracks/plays?limit=1&next=true";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $object = (array)$obj;
    $object = (array)$object['played_tracks'];
    $object = (array)$object[0];
    $titre = $object['title'];
    $artist = (array)$object['artist'];
    $artist = $artist['name'];
    $tosend = $artist . " - ".$titre;
    //print_r($at);
    $titAv="True";
    $urlpoc="https://api-80s.joe.be".$object['thumbnail'];
} else if ($radio == 'joe80s') {
    $lienjson="https://api-80s.joe.be/2.4/tracks/plays?limit=1";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $object = (array)$obj;
    $object = (array)$object['played_tracks'];
    $object = (array)$object[0];
    $titre = $object['title'];
    $artist = (array)$object['artist'];
    $artist = $artist['name'];
    $tosend = $artist . " - ".$titre;
    $titAv="True";
    $urlpoc="https://api-80s.joe.be".$object['thumbnail'];
} else if ($radio == "fg") {
    $lienjson="https://www.radiofg.com/players/index/gettitrageplayer/idplayers/2174546520932614607";
    $obj = json_decode(file_get_contents($lienjson),true);
    $tosend=$obj['title_str'];
    if ($tosend == " - ") {
        $tosend= `python3 fg.py`;
        $titAv="False";
    } else {
    $artist=$obj['title'];
    $titre=$obj['artist'];
    if (strpos($obj['image'], "https") === false) {
    $urlpoc="https://www.radiofg.com".$obj['image'];
    } else {
        $urlpoc=$obj['image'];
    }
    $titAv="True";
    }
} else if ($radio == "roxx") {
    $lienjson = "http://www.clubfmserver.be:8000/status-json.xsl";
    $json = file_get_contents($lienjson);
    $obj=json_decode($json,true);
    $mydata=$obj["icestats"]["source"][12];
    $titAv="True";
    $tosend=$mydata["title"];
    $titar=explode(" - ",$tosend);
    $titre=$titar[1];
    $artist=$titar[0];
    $urlpoc="https://cdn-profiles.tunein.com/s112768/images/logoq.png";
    //$tosend="bite";

}
else if ($radio == "rfm") {
    $lienjson = "http://directradio.rfm.fr/rfm/now/3";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $test = (array)$obj;
    $test = (array)$test['current'];
    //print_r($test);
    $titre = $test['title'];
    $artist = $test['artist'];
    if (gettype($titre) == "array") {
        $titre=" ";
    }
    $tosend= $artist . " - ".$titre;
    $titAv="True";
    if ($test['cover']=="http://cdn-directradio-rfm.ladmedia.fr/a2i/img/Array") {
        $urlpoc="https://cdn-rfm.ladmedia.fr/bundles/rfmintegration/images/logoRFM.png";
    } else{
    $urlpoc=$test['cover'];
    }
} else if ($radio == "nosta") {
    $lienjson = "https://players.nrjaudio.fm/wr_api/live/fr?act=get_plist&id_wr=197&cp=utf8&fmt=json";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $artist = $obj['itms'][0]['art'];
    $titre = $obj['itms'][0]['tit'];
    $tosend = $artist." - ".$titre;
    $urlpoc="https://players.nrjaudio.fm/live-metadata/player/img/600x/".$obj['itms'][0]['cov'];
    $titAv="True";
} else if ($radio =="r2wvl") {
    $tosend=`python3 r2wvl.py`;
    $titAv="False";
} else if ($radio == "hotmx80") {
    $lienjson="http://api2.hotmixradio.fr/transfert/json/json-ajax-infos.json";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $vari=$obj['hotmixradio'][0]['songs'][0];
    $titre=$vari['title'];
    $artist=$vari['artist'];
    $tosend=$artist." - ".$titre;
    $urlpoc=$vari['coverlarge'];
    $titAv="True";
} else if ($radio == "stubru") {
    $tosend=`python3 stubru.py`;
    $titAv="False";
} else if ($radio == "caroline") {
    // http://www.radiocaroline.co.uk/acrcloud/songhistory.json
    $lienjson="http://www.radiocaroline.co.uk/acrcloud/songhistory.json";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $sa=$obj['songs'][0];
    $titAv="True";
    $titre=$sa['title'];
    $artist=$sa['artist'];
    $urlpoc="https://cdn.absoluteradio.co.uk/artists/1-1/320x320/0.jpg";
    $tosend=$artist." - ".$titre;
} else if ($radio == "playloud") {
    $lienjson="http://www.playloud.fr/controllers/enCours.php?info=enCours";
    $res = file_get_contents($lienjson);
    $tosend=$res;
    $titAv="False";
} else if ($radio == "metropolys") {
    $lienjson="http://www.metropolys.com/cache/titreplayer10";
    $obj = json_decode(file_get_contents($lienjson),true);
    $tosend=$obj['title_str'];
    $urlpoc=$obj['image'];
    $titre=$obj['title'];
    $artist=$obj['artist'];
    $titAv="True";
} else if ($radio == "bbcr2") {
    $lienjson="https://rms.api.bbc.co.uk/v2/services/bbc_radio_two/tracks/latest/playable";
    $obj = json_decode(file_get_contents($lienjson),true);
    $urlpoc=str_replace("{recipe}","320x320",$obj['data'][0]['image_url']);
    $obj=$obj['data'][0]['titles'];
    $tosend=$obj['secondary']. " - ".$obj['primary'];
    $titre=$obj['primary'];
    $artist=$obj['secondary'];
    $titAv="True";
} else if ($radio == "plaza") {
    /*$lienjson="https://plaza.one/socket.io/?EIO=3&transport=polling&t=MYRPCDt";
    //$cont = file_get_contents($lienjson);
    //$cont = str_replace("96:0","",$cont);
    //$cont = str_replace("2:40","",$cont);
    $ob1 = json_decode($cont, true);
    $info=$ob1['sid'];
    $lienjson2="https://plaza.one/socket.io/?EIO=3&transport=polling&t=MYRPCI0&sid=".$info;
    $nw = file_get_contents($lienjson2, true);
    $nw=explode(",",$nw);
    $tosend=str_replace('"',"",$nw[2])." - ".str_replace('"',"",$nw[3]);
    $titre=str_replace('"',"",$nw[3]);
    $artist=str_replace('"',"",$nw[2]);*/
    $lienjson="https://api.plaza.one/status";
    $obj=file_get_contents($lienjson);
    $obj=json_decode($obj,true);
    $artist=$obj['playback']['artist'];
    $titre=$obj['playback']['title'];
    $tosend=$artist." - ".$titre;

    $titAv="True";
    $urlpoc="https://plaza.one/".$obj['playback']['artwork'];
} else if ($radio =="cno") {
    $titAv="True";
    $titre=`python3 cno.py titre`;
    $artist=`python3 cno.py artist`;
    $tosend=$artist." - ".$titre;
    $urlpoc="https://www.cno-radio.fr/fichiers/pochettes/pochette_generique_cno.jpg";
} else if ($radio == "mona") {
    $titAv="True";
    $lienjson="http://www.monafm.fr/players/index/gettitrageplayer/idplayers/2";
    $cont = file_get_contents($lienjson);
    $ob1 = json_decode($cont, true);
    $titre=$ob1['title'];
    $artist=$ob1['artist'];
    $tosend=$ob1["title_str"];
    $urlpoc=$ob1['image'];
} else if ($radio == "joe2k") {
    $lienjson="https://api-top2000.joe.be/2.4/tracks/plays?limit=1";
    $json = file_get_contents($lienjson);
    $obj = json_decode($json,true);
    $object = $obj;
    $object = $object['played_tracks'];
    $object = $object[0];
    $titre = $object['title'];
    $artist = $object['artist'];
    $artist = $artist['name'];
    $tosend = $artist . " - ".$titre;
    $titAv="True";
    $urlpoc="https://api-top2000.joe.be".$object['thumbnail'];
} else if ($radio=="absrad") {
    $lienutile="https://absoluteradio.co.uk/absolute-radio/";
    $donnee = getdatas($lienutile);
    $titre=$donnee[2];
    $artist=$donnee[1];
    $urlpoc=$donnee[0];
    $tosend=$artist." - ".$titre;
    $titAv="True";
} else if ($radio=="unionjack") {
//   /*
   // API UnionJack v1 basée sur le webplayer de https://www.unionjack.co.uk/
    $lienjson="https://api.ldrhub.com/2/?key=natjack&method=Station.Engage.NowPlaying";
    // Forcing ipv4
    $data = file_get_contents($lienjson, false, stream_context_create(['socket' => ['bindto' => '0:0']]));
    //$data = file_get_contents($lienjson);
    $obj = json_decode($data, true);
   // print_r($obj);
    if(is_null($obj['Station.Engage.NowPlaying']['now_playing'])) {
      $titAv="False";
      $tosend="Playing the best of British";
    } else {
      $donnees=$obj['Station.Engage.NowPlaying']['now_playing'];
      $titAv="True";
     
      //                             
      
      $artist=$donnees['artist'];
      $titre=$donnees['title'];
      $idpoc=$donnees['collection_id'];
      if (strlen((string)$idpoc)==5) {
        $id1=substr($idpoc,0,-2);
        $id2=substr($idpoc,-2);
        $id1=substr($id1,-3);
      } else {
        $id1=substr($idpoc,0,-3);
        $id2=substr($idpoc,-3);
        $id1=substr($id1,-3);
      }
      $tosend=$artist. " - ".$titre;

      $urlpoc="https://static.ldrhub.com/itunes_art/".$id1."/".$id2."/".$idpoc."/200.jpg";
    
      }
/*
si v1 ne fonctionne pas, basée sur la récupération du titre via le footer de leur site
*/
// $titAv="True";
//  $donnees=getdatasUJ();
//  $titre=$donnees[0];
//  $titre=str_replace('                            ', '', $titre);
//  $artist=$donnees[1];
//  $artist=str_replace('                        ', '', $artist);
//  $urlpoc=$donnees[2];
//  $tosend=$artist. " - ".$titre;
// */

    }else if ($radio == "nostg80mix") {
        $titAv="True";
        $urlpoc="https://players.nrjaudio.fm/live-metadata/player/img/600x/196378-201807.JPG";
        $titre="Nostalgie Génération 80 Le Mix";
        $artist="Pascal Dam";
        $tosend="L'émission culte des années 80 de Nostalgie mixé par Pascal Dam.";
}else if ($radio == "CROONER") {
    $lienjson = "http://www.crooner.fr/partners/app/global.php";
    $json=file_get_contents($lienjson);
    $obj=json_decode($json,true);
    $titre=$obj['crooner'][0]['title'];
    $artist=$obj['crooner'][0]['subtitle'];
    $urlpoc=$obj['crooner'][0]['thumbnail'];
    $tosend=$artist." - ".$titre;
    $titAv="True";


}else if ($radio=="collector") {
    $lienjson="https://www.ouifm.fr/onair.json";
    $data=file_get_contents($lienjson);
    $json=json_decode($data,true);

    $json=$json['collector'][0];
    if(isset($json['title'])) {
        $titre=$json['title'];
        $artist=$json['artist'];
        $urlpoc=$json['img'];
        $tosend=$artist." - ".$titre;
        $titAv="True";    
    } else{
    $titAv="False";
    $tosend="Radio Collector : Collection De Tubes Légendaires";
}} else if ($radio=="Towr") {
    // $datas=`python3 tmwland.py`;
    // if (strpos($datas," - ") == true) {
    //     $dt=explode(" - ",$datas);
    //     $titre=$dt[1];
    //     $artist=$dt[0];
    //     $tosend=$dt[0]." - ".$dt[1];
    // } else {
    //     $tosend=$datas;
    //
 $lienjson="https://pl-cache.weareone.world/minimal/nowplaying";
 $data=file_get_contents($lienjson);
$json=json_decode($data,true);
 $titre=$json['title'];
 $artist=$json['artist'];
 $tosend=$artist." - ".$titre;
 $liendataimg="https://pl-cache.weareone.world/minimal/image/".strval($json['imageRef']);

 $dataimg=file_get_contents($liendataimg);
 $jsonimg=json_decode($dataimg,true);
 $urlpoc="data:image/jpeg;base64,".$jsonimg['base64image'];
 $titAv="True";


}else if ($radio=="delta") {
// <h6 style='margin:0; padding:0'><span style='color: #ff0000;'> </h6> artist
// <p style='margin:0; padding:0'> </p> title
$dt = file_get_contents("https://www.deltafm.fr/partage/titre_header.html");
$titre = explode("</p>",explode("<p style='margin:0; padding:0'>",$dt)[1])[0];
$artist = explode("</span></h6>",explode("<h6 style='margin:0; padding:0'><span style='color: #ff0000;'>",$dt)[1])[0];
// 
$urlpoc = explode("'",explode("<img class='vc_single_image-img'  src='",$dt)[1])[0];
$titAv="True";
$tosend = $artist . " - ".$titre;




}else if ($radio == "dh") {
    $lienjson = "https://np.maradio.be/qp/v3/events?callback=jQuery310011626126297474615_1550189045193&rpId=1003&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1550189045199";
    
    $json = file_get_contents($lienjson);
    $json = str_replace("jQuery310011626126297474615_1550189045193","",$json);
    $json = str_replace("({","{",$json);
    $json = str_replace("})","}",$json);
    $obj = json_decode($json, true);
    //print_r($obj);
    //echo "<br/>";
    //print_r($obj['results']['now']);
    if (isset($obj['results']['now']['name'])) {
        $tosend= $obj['results']['now']['artistName']." - ".$obj['results']['now']['name'];
        
    $titre=$obj['results']['now']['name'];
    $artist=$obj['results']['now']['artistName'];
    $titAv="True";
    } else {
        $tosend= $obj['results']['now']['programmeName'];
        //error_log("bite");
        $titAv="False";
    }
    $urlpoc=$obj['results']['now']['imageUrl'];
} else if (trouvest($radio,"cherche")) {
    $n=trouvest($radio,"");
    $titre=$n[0];
    $artist=$n[1];
    $urlpoc=$n[2];
    $tosend=$artist." - ".$titre;
    $titAv="True";
}
$tosend = preg_replace( "/\r|\n/", "", $tosend);
$tosend = str_replace( '"', "'", $tosend);
$tosend = str_replace( '�', "e", $tosend);
//$tosend = preg_replace( '"', "'", $tosend);
$titre = preg_replace( "/\r|\n/", "", $titre);
$titre = str_replace( '"', "'", $titre);
$titre = str_replace( '�', "é", $titre);
//$titre = preg_replace( '"', "'", $titre);
$artist = preg_replace( "/\r|\n/", "", $artist);
$artist = str_replace( '"', "'", $artist);

$urlpoc = preg_replace( "/\r|\n/", "", $urlpoc);
if(isset($_GET['r'])) {
    echo '{
        "tit":"'.$tosend.'",
        "titAvail":"'.$titAv.'",
        "titre":"'.$titre.'",
        "artist":"'.$artist.'",
        "pochetteURL":"'.$urlpoc.'"
    }';
} else {
    echo $tosend;
}
?>
