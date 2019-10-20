import json, urllib, urllib.request, sys
with urllib.request.urlopen("https://www.cno-radio.fr/majtitreandpochette.php") as url:
    data = url.read().decode('utf8')
rep=data
utile=rep.split(">")
z=[]
for i in utile:
    z.append(i.split('<'))
if (len(sys.argv)>1):
    if sys.argv[1] == "titre":
        print(z[15][0])
    else:
        print(z[13][0])
else:
    print(z[13][0], "-",z[15][0])
    