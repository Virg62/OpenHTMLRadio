// Fonction boutons
srcrad={}
function setbutton(type) {
    console.log("Menu Choisi : "+type);
    // Récupération du contenu de la balise des btns
    window.menu = document.getElementById('listeR');
    // Defaut
    if (type=="home") {
        console.log("home");
        window.menu.innerHTML = `<ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-success" onClick="setbutton('belge')">Station Belges</button></li>
        <li><button type="button" class="btn btn-success" onClick="setbutton('oldies')">Oldies</button></li>
        <li><button type="button" class="btn btn-success" onClick="setbutton('local')">Locales</button></li>
        <li><button type="button" class="btn btn-success" onClick="setbutton('nouveautes')">Nouveautés</button></li>
        <li><button type="button" class="btn btn-success" onClick="setbutton('80s')">80s</button></li>
        <li><button type="button" class="btn btn-success" onClick="setbutton('dabpBE')">DAB+ Belgique</button></li>
        <li><button type="button" class="btn btn-primary" onClick="setbutton('rech')">Recherche</button></li>  
        
        </ul>`;
    } else if (type=="empty") {
        window.menu.innerHTML = "";
        console.log("vide");
    } else if (type=="belge") {
        window.menu.innerHTML = `
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('cl21')">Classic 21</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('joe')">Joe</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('joe80s')">Joe 80's</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('willy')">Willy</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('nostVL')">Nostalgie</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('r2wvl')">Radio 2 W-VL</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('viva')">VivaCité</button></li>
        </ul>
        `;
    } else if (type=="oldies") {
        window.menu.innerHTML=`
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('rfm')">RFM</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('rtl2')">RTL2</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('gli')">Grand Lille Info</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('nosta')">Nostalgie</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('unionjack')">Union JACK</button></li>
        </ul>
        `;
    } else if (type=="local") {
        window.menu.innerHTML=`
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('horizon')">Horizon</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('plus')">PLUS</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('mona')">Mona FM</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('banquise')">Banquise</button></li>
        </ul>
        `;
    } else if (type=="nouveautes") {
        window.menu.innerHTML=`
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('fg')">FG.</button></li>
      <!--  <li><button type="button" class="btn btn-primary" onClick="play('plus')">PLUS</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('banquise')">Banquise</button></li>-->
        </ul>
        `;
    } else if (type=="80s") {
        window.menu.innerHTML=`
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('abs80s')">Absolute 80s</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('heart')">Heart 80s</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('hotmx80')">Hotmix 80</button></li>
        </ul>
        `;
    } else if (type=="rech") {
        window.menu.innerHTML=`
        <ul id="rechercheUL">
            <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
            <li><input type="text" id="name" name="name" placeholder="Station de Radio" /></li>
            <li><button type="button" class="btn btn-primary" onClick="recherche()">Chercher</button></li>
        </ul>
    `;
    } else if (type=="dabpBE") {
        window.menu.innerHTML=`
        <ul>
        <li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('contact')">Radio Contact</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('cl21')">Classic 21</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('beRTL')">Bel RTL</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('nostBE')">Nostalgie BE</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('nrjBE')">NRJ Be</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('la1ere')">La 1ère</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('viva')">Vivacité</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('vivaplus')">Viva +</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('funBE')">Fun Radio BE</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('sudrad')">Sud Radio</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('m3')">Musiq3</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('pure')">Pure</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('jam')">Jam.</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('tarmac')">Tarmac</button></li>
        <li><button type="button" class="btn btn-primary" onClick="play('dh')">DH Radio</button></li>
        </ul>
        `;
    }

 }

function recherche(n) {
    z="";
    if(typeof(n) != 'undefined') {
        textbox=n;
        z="&n=exact";
        rech = false;
    } else {
    textbox=document.getElementById('name').value;
    rech = true;
    }
    //console.log(textbox);
    // On va chercher dans la BDD si le terme cherché existe
    const req = new XMLHttpRequest();
    req.open('GET', 'searchST.php?nom='+textbox+z, false); 
    req.send(null);
    toset=`<li style="margin-top: 5px;"><button type="button" class="btn btn-danger" onClick="setbutton('home')">Retour</button></li>`;
    if (req.status === 200) {
        o=JSON.parse(req.responseText);
        
        for(var key in o) {
            if (typeof o[key]["3"] != "undefined") {
            toset=toset+`<li><button type="button" class="btn btn-primary" onClick="play('`+o[key]["4"]+`')">`+o[key]["3"]+`</button></li>`;
            srcrad[o[key]['4']]=o[key];
        }}
        if (rech) {
        document.getElementById('rechercheUL').innerHTML=toset;
        }
       console.log(o);
        console.log("Réponse reçue: %s", req.responseText);
    } else {
        console.log("Status de la réponse: %d (%s)", req.status, req.statusText);
    }
}