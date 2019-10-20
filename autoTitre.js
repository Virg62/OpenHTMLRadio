function autoTitre() {
    if(typeof stat != 'undefined') {
        const req = new XMLHttpRequest();
        req.open('GET', './req.php?rad='+rad+'&r=22', false); 
        req.send(null);
        if (req.status === 200) {
console.log("Actuellement : %s", req.responseText);
if (req.responseText != ""){
//window.titre.innerHTML=req.responseText;
}
} else {
console.log("Code d'erreur: %d (%s)", req.status, req.statusText);
}
n=JSON.parse(req.responseText);
dict=n;  
// Détecte si la fonction JSON & Title est dispo
if (typeof dict !== 'undefined') {
// your code here
console.log("JSON & Title Disponible ! Initialisation en cours !");

// Récupération des variables
titreC=document.getElementById("titreM").innerHTML;
artisteC=document.getElementById("artist").innerHTML;

if (dict['titAvail']=="True") {
document.getElementById("titreM").innerHTML=dict["titre"];
document.getElementById("artist").innerHTML=dict['artist'];
window.document.title=dict['artist']+" - "+dict['titre'];
if (dict['pochetteURL'] !== "") {
    //document.getElementById("pochette").src="";
    document.getElementById("pochette").src=dict['pochetteURL'];
    change_favicon(dict['pochetteURL']);
} else {

}
titreR=dict['tit'];
window.titre.innerHTML=titreR;
document.getElementById("attheme").style.display = "block";
} else if (dict['tit'] != "") {
  titreR = dict['tit'];
  window.titre.innerHTML=titreR;
  window.document.title=titreR;
  window.document.getElementById("attheme").style.display = "none"; 
}
}else if (dict['tit'] != ""){
titreR = dict['tit'];
window.titre.innerHTML=titreR;
window.document.title=titreR;
  window.document.getElementById("attheme").style.display = "none"; 
}}}


function change_favicon(img) {
    var favicon = document.querySelector('link[rel="shortcut icon"]');
    
    if (!favicon) {
        favicon = document.createElement('link');
        favicon.setAttribute('rel', 'shortcut icon');
        var head = document.querySelector('head');
        head.appendChild(favicon);
    }
    
    
    favicon.setAttribute('type', 'image/jpg');
    favicon.setAttribute('href', img);
}
