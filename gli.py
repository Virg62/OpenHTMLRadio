#!/usr/bin/env python
# Script Adapté pour envoi vers possible encodeur RDS
from __future__ import print_function
from os import system
import re
import struct
import sys
import time
starttime=time.time()
old=""

#Le système de statistiques
artistes=[]



try:
    import urllib2
except ImportError:  # Python 3
    import urllib.request as urllib2
url = 'http://str0.creacast.com/grandlilleinfos'  # radio stream
encoding = 'latin1' # default: iso-8859-1 for mp3 and utf-8 for ogg streams
nomcourt="GLInfo"
nomlong="Grand Lille Info"
def getmusique():
    request = urllib2.Request(url, headers={'Icy-MetaData': 1})  # request metadata
    response = urllib2.urlopen(request)
    #print(response.headers, file=sys.stderr)
    metaint = int(response.headers['icy-metaint'])
    for _ in range(1): # # title may be empty initially, try several times
        response.read(metaint)  # skip to metadata
        metadata_length = struct.unpack('B', response.read(1))[0] * 16  # length byte
        metadata = response.read(metadata_length).rstrip(b'\0')
        # extract title from the metadata
        m = re.search(br"StreamTitle='([^']*)';", metadata)
        testeeeee = metadata[13:len(metadata)-2]
        #testeeeee = testeeeee.decode("utf-8")
        #if m:
        #    title = m.group(1)
        #    if title:
        #        break
        title=testeeeee
    #else: 
        #sys.exit('no title found')
    #print(title.decode(encoding, errors='replace'))

    global titre
    global titrem
    global artiste
    try:
        title
    except NameError:
        titre="Vous etes sur Grand Lille Info"
        musique=titre
        artiste=""
        titrem=musique
    else:     
        titre = title.decode(encoding, errors='replace')
        musique = titre.split("- ",1)
        artiste=musique[0]
        titrem=musique[1]
        artistes.append(artiste)
    #print(titre)
    #print("Artiste :", musique[0])
    #print("Titre :", musique[1])
    
#print("Liste des titres passés: ")
def setmusictitle():
    getmusique()
    rds=nomcourt
   # rtext=nomlong, "->", artiste, "-", titrem
    #print(rds)
    print(titre)

setmusictitle()

