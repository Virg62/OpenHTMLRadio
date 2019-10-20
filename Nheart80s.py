import urllib, urllib.request, json
url="https://www.heart.co.uk/dynamic/now-playing-card/80s/"
resultat=urllib.request.urlopen(url).read().decode('utf8')
mesdonnees=resultat.split("</article>")[0]
titre=mesdonnees.split('<div itemprop="name" class="track">\n                ')[1].split("\n")[0]
artist=mesdonnees.split('<div itemprop="byArtist" class="artist">\n                \n    \n           ')[1].split("\n")[0]
if 'data-src="' in mesdonnees:
    urlpoc=mesdonnees.split('data-src="')[1].split('"')[0]
else:
    urlpoc="https://static.heart.co.uk/assets_v4r/gusto/img/default_image_track.svg"
resultat={"titre":titre, "artist":artist, "urlpoc":urlpoc}
print(json.dumps(resultat))