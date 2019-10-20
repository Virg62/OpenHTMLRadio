<?php
function getdatasUJ() {
    $liendonnees="https://www.unionjack.co.uk";
    $page=file_get_contents($liendonnees);
    $d1 = explode('<p class="c-cross-promo__tagline">Playing the best of British.</p>', $page);
    $d2 = explode('</div>', $d1[1]);
    $titart=$d2['0'];
   // echo $titart;
    $d=explode(' by ', $titart);
    $titre=$d[0];
    $artist=$d[1];
    //echo $artist. " - ".$titre;
    $pocalb=explode('<img src="', $d2[1]);
    $pocalb=explode('">', $pocalb[1]);
    //echo $pocalb[0];
    return [$titre,$artist,$pocalb[0]];
}
//getdatas();

?>