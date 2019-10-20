function play(rad) {
    if (rad == 'cl21') {
        //console.log(window.station, window.logos, window.titre);
        window.stat="Classic 21";
        logoo="https://www.static.rtbf.be/news/common/images/radio/logo/1400x1400/classic21-1400x1400.png";
        title="Écoutez l'original";
        sourceaudio="http://radios.rtbf.be/classic21-128.mp3";
        } else if (rad=="viva"){
            window.stat="VivaCité Hainaut";
            title="Ma radio complicité en Hainaut";
            logoo="https://marpimagecache.s3.amazonaws.com/image/13_300x170_2018-06-12-12-18-44-849.png";
            sourceaudio="https://radios.rtbf.be/vivahainaut-128.mp3";
        }else if (rad== 'abs80s') {
        window.stat="Absolute 80s";
        logoo="http://db.radioline.fr/pictures/radio_7cc6681be99085098a6e49d340da9528/logo200.jpg?size=600";
        title="We are Absolute 80s";
        sourceaudio="http://ais.absoluteradio.co.uk/absolute80s.aac";
        } else if (rad == 'gli') {
            window.stat="Grand Lille Info";
            logoo="https://www.grandlille.tv/wp-content/uploads/2018/09/grand-lille-info-tv-logo-2-1.jpg";
            title="Info, Service et Classic Rock!";
            sourceaudio="http://str0.creacast.com/grandlilleinfos";
        } else if (rad == 'heart') {
            window.stat="Heart 80s";
            logoo="https://assets.heart.co.uk/2018/39/heart-80s-1538474935-editorial-long-form-0.png";
            title="Heart80s";
            sourceaudio="http://media-ice.musicradio.com:80/Heart80sMP3";
        } else if (rad == 'rtl2') {
            window.stat="RTL2";
            logoo="https://upload.wikimedia.org/wikipedia/fr/thumb/f/fa/RTL2_logo_2015.svg/220px-RTL2_logo_2015.svg.png";
            title="Le Son Pop Rock Non Stop !";
            sourceaudio="http://streaming.radio.rtl2.fr/rtl2-1-48-192";
        } else if (rad == 'joe') {
            window.stat="Joe";
            logoo="https://static1.qmusic.medialaancdn.be/assets/stations/logos/iphone/joe_fm-c1818457cdd285b0dc436ae78f4681c9.png";
            title="Joe All The Way";
            sourceaudio="http://icecast-qmusic.cdp.triple-it.nl/JOEfm_be_live_128.mp3";
        } else if (rad == 'joe80s') {
            window.stat="Joe 80's";
            logoo="./logoST/joe80s.jpg";
            title="Joe All The Way";
            sourceaudio="https://playerservices.streamtheworld.com/api/livestream-redirect/JOE_80S.mp3?pname=rp_external";
        } else if (rad == "nostVL") {
            window.stat="Nostagie VL";
            logoo="http://www.nostalgie.eu/images/toplogo2018.png";
            title="What a Feeling";
            sourceaudio="http://nostalgiewhatafeeling.ice.infomaniak.ch/nostalgiewhatafeeling-128.mp3";
        } else if (rad == "nosta") {
            window.stat="Nostagie";
            logoo="https://www.nostalgie.fr/build/img/logo-nostalgie-baseline.svg";
            title="LES PLUS GRANDES CHANSONS";
            sourceaudio="http://cdn.nrjaudio.fm/audio1/fr/30601/mp3_128.mp3?origine=fluxradios";
        } else if (rad == 'rfm') {
            window.stat="RFM";
            logoo="https://cdn-rfm.lanmedia.fr/bundles/rfmintegration/images/logoRFM.png";
            title="LE MEILLEUR DE LA MUSIQUE";
            sourceaudio="http://rfm-live-mp3-128.scdn.arkena.com/rfm.mp3";
        } else if (rad=="horizon") {
            window.stat="Horizon";
            logoo="./logoST/horizon.jpg";
            title="PREMIER SUR LA RÉGION";
            sourceaudio="http://horizonradio-bethunelens.ice.infomaniak.ch/horizonradio-bethunelens-128";
        } else if (rad=="plus") {
            window.stat="PLUS";
            logoo="./logoST/plus.jpg";
            title="LA FM QUE J'AIME";
            sourceaudio="http://radioplus2.ice.infomaniak.ch/radioplus.aac";
        } else if (rad=="banquise") {
            window.stat="BANQUISE";
            logoo="./logoST/banquise.jpg";
            title="FRESH MUSIC";
            sourceaudio="http://94.23.21.126:10050/;stream.mp3";
        } else if (rad=="fg") {
            window.stat="FG.";
            logoo="./logoST/fg.jpg";
            title="FEEL GOOD";
            sourceaudio="http://radiofg.impek.com/fg192";
        } else if (rad=="r2wvl") {
            window.stat="Radio 2 West-Vlaanderen";
            logoo="./logoST/r2wvl.jpg";
            title="R2 W-VL";
            sourceaudio="http://icecast.vrtcdn.be/ra2wvl-high.mp3";
        } else if (rad=="hotmx80") {
            window.stat="Hotmix 80";
            title="La Radio 100% Années 80";
            sourceaudio="http://streamingads.hotmixradio.fm/hotmixradio-80-64.mp3";
            logoo="https://static.hotmixradio.fr/wp-content/uploads/HOTMIXRADIO-80-500x500.png";
        } else if (rad=="dh") {
         window.stat="DH Radio";
         title="Le Plaisir de la musique";
         sourceaudio="http://dhradio.ice.infomaniak.ch/dhradio-96.aac";
         logoo="./logoST/dh.jpg";   
        } else if (rad == "unionjack") {
            window.stat="Union JACK";
            title="Playing the best of British";
            sourceaudio="https://playerservices.streamtheworld.com/api/livestream-redirect/JACK_DAB_HIAAC.aac";
            logoo="https://mm.aiircdn.com/292/57b6ead42fc6a.png";
        }   
        else if (rad in srcrad) {
            window.stat=srcrad[rad]["3"];
            title=srcrad[rad]["1"];
            sourceaudio=srcrad[rad]["0"];
            logoo=srcrad[rad]["2"];
        } else {
            recherche(rad);
            window.stat=srcrad[rad]["3"];
            title=srcrad[rad]["1"];
            sourceaudio=srcrad[rad]["0"];
            logoo=srcrad[rad]["2"];
        }
        window.rad=rad;
    window.lect.pause();
    window.station.innerHTML=stat;
    window.logos.src=logoo;
    window.titre.innerHTML=title;
    window.lect.src=sourceaudio;
    window.lect.load();
    window.lect.play();
    autoTitre();
}
