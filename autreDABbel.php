<?php
function trouvest($pnom,$etat) {
    $lnkpoc="";
    $titre="";
    $artist="";
    $listeST=["pure","tarmac","nostBE","beRTL","contact","nrjBE","funBE","mint", "la1ere","m3","sudrad","vivaplus","jam"];
    if ($etat!="") {
        if (in_array($pnom,$listeST)) {
            return true;
        } else {
            return false;
        }
    } else {
    if ($pnom=="pure"){

        // RTBF Pure -------------------------------------------

        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31102237974743078628_1552376937037&rpId=11&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1552376937044";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery31102237974743078628_1552376937037","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }
       
        return [$titre,$artist,$lnkpoc];

         // ------------------------------------------------------

    }else if ($pnom=="tarmac") {

        // RTBF Tarmac -------------------------------------------
        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31105059892757164655_1552377435851&rpId=210&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1552377435856";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery31105059892757164655_1552377435851","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }
       

       
        // -------------------------------------------------------

        return [$titre,$artist,$lnkpoc];
    }else if ($pnom=="nostBE") {
        
        // NOSTALGIE BELGIQUE -----------------------------
        
        $lienjson="https://np.maradio.be/qp/v3/events?callback=jQuery310010739310421232973_1552314912260&rpId=9&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1552314912268";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery310010739310421232973_1552314912260","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre="Une furieuse envie de chanter";
        }
        //   $lienjson="https://www.nostalgie.be/utils/currentitlewebradio/18";
         //   $json=json_decode(file_get_contents($lienjson),true);
        //    $titre=$json['titre'];
          //  $artist=$json['artiste'];
          //  $lnkpoc="https://www.nostalgie.be/utils/covers/".$json['data'];

            
        return [$titre,$artist,$lnkpoc];

        // ------------------------------------------------

    }
    else if ($pnom == "nrjBE") {
        // NRJ Be -----------------------------------------

        $lienjson="https://www.nrj.be/utils/currentitlewebradio/17";
        $json=json_decode(file_get_contents($lienjson),true);
        $titre=$json['titre'];
        $artist=$json['artiste'];
        $lnkpoc="https://www.nrj.be/utils/covers/".$json['data']."/170";


        return [$titre,$artist,$lnkpoc];

        // -------------------------------------------------

    } else if ($pnom=="beRTL"){

        // Bel RTL ----------------------------------------

        $titre="Vos Meilleurs Moments";
        $artist="Bel RTL";
        $lnkpoc="https://www.rtl.be/belrtl/css/belrtl/img-v3/Logo-Bel-RTL.png";
        return [$titre,$artist,$lnkpoc];

        // ------------------------------------------------

    } else if ($pnom=="la1ere") {
        // RTBF La 1ere ----------------------------------
        
        // http://np.maradio.be/qp/v3/events?callback=jQuery311006750618956457544_1564786508263&rpId=1103&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1564786508268
        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery311006750618956457544_1564786508263&rpId=1103&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1564786508268";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery311006750618956457544_1564786508263","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }
    
        return [$titre,$artist,$lnkpoc];
        // ------------------------------------------------
    } else if ($pnom=="m3") {
        // RTBF Music3
        // http://np.maradio.be/qp/v3/events?callback=jQuery31106635994217879844_1564786841804&rpId=18&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1564786841809
        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31106635994217879844_1564786841804&rpId=18&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1564786841809";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery31106635994217879844_1564786841804","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }
    
        return [$titre,$artist,$lnkpoc];
        // ------------------------------------------------ 

    }else if ($pnom=="contact") {
 
        // Radio Contact ----------------------------------
        $lienjson=`python3 contactbe.py`;
        //echo $lienjson;
        $lienjson=str_replace("\n","",$lienjson);
        $lienjson=str_replace("\r","",$lienjson);
        //error_log($lienjson);
        $json = file_get_contents($lienjson);
        $json=utf8_decode($json);
        $json=str_replace("\n","",$json);
        $json=str_replace("id","'id'",$json);
        $json=str_replace("artist","'artist'",$json);
        $json=str_replace("title","'title'",$json);
        $json=str_replace("cover:","'cover':",$json);
        $json=str_replace("coveroriginal:","'coveroriginal':",$json);
        $json=str_replace("'",'"',$json);
        $json=str_replace('": "','":"',$json);
        //echo $json;
        $json=str_replace('	','',$json);
        $json=str_replace('?','',$json);
        //$json = trim(preg_replace('/\t/g', '', $json));
        //echo $json;
        $obj = json_decode($json,true);
        #error_log($obj);
        //print_r($obj);
        //$json=str_replace('{"track" : [',"",$json);
        #$json=str_replace("\t","",$json);
       // echo $json;
        #$obj = json_decode($json, true);
        //print_r($obj);
        $titre=$obj['title'];
        //"Feel Good";
        $artist=$obj['artist'];
        //"Radio Contact";
        $lnkpoc=$obj['cover'];






        // ------------------------------------------------



        return [$titre,$artist,$lnkpoc];
    } else if ($pnom=="mint"){

        // RTBF Pure -------------------------------------------

        $lienjson="https://np.maradio.be/qp/v3/events?callback=jQuery311011913467280602186_1563401660231&rpId=7&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1563401660236";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery311011913467280602186_1563401660231","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $lnkpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }
       
        return [$titre,$artist,$lnkpoc];

         // ------------------------------------------------------

    } else if ($pnom == "sudrad") {
        $titre="Vous écoutez Sud Radio partout en Hainaut !";
        $artist="Sud Radio";
        $donnees = file_get_contents("http://www.sudradio.net/fr/playlist.html");
        $artist = explode("<td style='width:40%'><b>",$donnees)[1];
        $artist = explode("</b>",$artist)[0];
        $titre = explode("</td><td style='width:45%'>",$donnees)[1];
        $titre = explode("</td>",$titre)[0];
        $titre = str_replace("<i>","",$titre);
        $titre = str_replace("</i>","",$titre);

        


        return [$titre, $artist, "http://www.sudradio.net/images/logo.png"];





    } else if ($pnom == "jam") {
      // http://np.maradio.be/qp/v3/events?callback=jQuery31104772880997026878_1570312258856&rpId=1132&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1570312258870
      $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31104772880997026878_1570312258856&rpId=1132&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1570312258870";
      $json = file_get_contents($lienjson);
      $json = str_replace("jQuery31104772880997026878_1570312258856","",$json);
      $json = str_replace("({","{",$json);
      $json = str_replace("})","}",$json);
      $obj = json_decode($json, true);
      $obj=$obj['results']['now'];
      $urlpoc=$obj['imageUrl'];
      if(array_key_exists('name',$obj)) {
          $titre=$obj['name'];
          $artist=$obj['artistName'];
      } else {
          $artist=$obj["serviceName"];
          $titre=$obj['programmeName'];
      }





      return [$titre,$artist,$urlpoc];



    }else if ($pnom == "vivaplus") {
        $titre = "Vos Chansons ont une histoire";
        $artist = "Viva +";
        $urlpoc = "https://marpimagecache.s3.amazonaws.com/image/1131_300x170_2019-09-26-09-08-53-947.png";

        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31109776872012319959_1570311868026&rpId=1131&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=1570311868029";
        $json = file_get_contents($lienjson);
        $json = str_replace("jQuery31109776872012319959_1570311868026","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        $obj=$obj['results']['now'];
        $urlpoc=$obj['imageUrl'];
        if(array_key_exists('name',$obj)) {
            $titre=$obj['name'];
            $artist=$obj['artistName'];
        } else {
            $artist=$obj["serviceName"];
            $titre=$obj['programmeName'];
        }





        return [$titre,$artist,$urlpoc];
    }
    else if ($pnom=="funBE") {
        // lien : 
        $lienjson="http://np.maradio.be/qp/v3/events?callback=jQuery31006139232632628515_1552380171392&rpId=3&nameSize=100000&serviceNameSize=100000&artistNameSize=100000&descriptionSize=100000&_=15523801713974";
        $json=file_get_contents($lienjson);
        $json = str_replace("jQuery31006139232632628515_1552380171392","",$json);
        $json = str_replace("({","{",$json);
        $json = str_replace("})","}",$json);
        $obj = json_decode($json, true);
        if (isset($obj["results"]["now"]["name"])) {
            $titre=$obj["results"]["now"]["name"];
            $artist=$obj["results"]["now"]["artistName"];

        } else {
            $titre="Le son dancefloor !";
            $artist="Fun Radio";
        }
        return [$titre,$artist,$obj["results"]["now"]["imageUrl"]];
    }else {
    
    }}
}
//print_r(trouvest("contact",""));
?>