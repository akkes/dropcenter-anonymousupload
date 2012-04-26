##############
## A PROPOS ##
##############

Programme : Drop Center Anonymous Upload
Version : V1.4
Distribution : BETA
Auteurs : -Valentin CARRUESCO aka Idleman (contact@dropcenter.fr - http://blog.idleman.fr)
-Paul R aka Fox (fox@dropcenter.fr - http://fox-photography.net63.net/me-contacter)

Contributeurs :
-Thibaud aka H3bus http://h3b.us
-Louis aka Ak:kes http://akkes.lescigales.org akkes.perso@gmail.com

Plugins : -jQuery Filedrop (Weixi Yen), basé sur la version de Martin Angelov (tutorialzine.com)
-Jquery (www.jquery.com)
-Phpjs (www.phpjs.org)
-PclZip (www.phpconcept.net/pclzip/)
-Poshytip (http://vadikom.com/demos/poshytip/)
-TinyPop (https://github.com/Checksum/Tinypop)

Icones : Faenza Icons par tiheum (http://tiheum.deviantart.com/art/Faenza-Icons-173323228)

##################
## INSTALLATION ##
##################

1. Décompressez l'archive de dropCenter
2. Envoyez le tout sur votre ftp
3. Autorisez l'écriture sur le répertoire /uploads (chmod 775 minimum, chmod 777 conseillé)
4. Entrez l'adresse du dropCenter dans votre naviguateur, à la première connexion, le login et le mot de passe souhaité pour l'administrateur seront demandés ainsi que l'adresse complète du script.
5. Le script est installé !!
6. Vous pouvez télécharger le programme bureautique DropNews en addition du dropcenter pour être informé par notification sur votre bureau de tous les nouveaux évènements du dropcenter. (voir le site officiel : http://dropcenter.fr)

#########
## FAQ ##
#########

#--> Mes gros fichiers ne passent pas, pourquoi?
Il faut augmenter la taille permise (MAX_SIZE) dans le fichier php/config.php. Pernsez également a modifier les valeur post_max_size et upload_max_filesize dans le fichier php.ini de votre serveur (/etc/php5/apache2/php.ini sous ubuntu).

#--> Peut on limiter les extensions?
En bricolant legèrement le script c'est très simple, sinon vous pouvez confgurer la variable FORBIDEN_FORMAT dans le fichier php/config.php avec toutes les extensions non permises, ceci n'empechera pas a l'utilisateur d'envoyer le fichier mais ajoutera automatiquement un '.txt' devant le fichier afin qu'il ne puisse pas être executé sur votre serveur.

#--> Supprimer un fichier ?
Une fois le fichier uploadé, survolez le fichier, une croix apparait en haut a droite, il s'agit du boutton supprimer.

#--> Modifier le nom du fichier ?
Une fois le fichier uploadé, double cliquez sur le nom du fichier, vous pouvez alors l'éditer, l'appuis sur la touche entré valide la modification.

#--> Je peux renommer et ajouter des fichiers mais rien d'autre, pourquoi?
Parce que vous êtes identifié avec un compte utilisateur, seul les comptes administrateurs peuvent supprimer un fichier ou gerer les autres utilisateurs

#--> J'ai oublié mon mot de passe ou mon identifiant admin, que faire?
Par le FTP, supprimez le fichier uploads/.user.dc.php et relancer dropcenter dans votre naviguateur, vos nouveaux identifiants admin seront à définir sur la page affichée

#-->Je ne trouve pas l'endroit pour mettre un avatar perssonalisé
C'est normal, Dropcenter utilise le service Gravatar pour gérer les avatars, si vous êtes inscrit sur gravatar (service gratuit,fiable et mondialement reconnus) Dropcenter déduira votre avatar a partir de votre adresse email.

Si vous n'utilisez pas gravatar, vous pouvez aller dans votre menu preference et specifier l'adresse d'une image (distante ou sur le dropcenter) qui vous représentera.

#############
## LICENCE ##
#############

Ce programme est sous licence :
Nom : CC BY-NC-ND 2.0
Url : http://creativecommons.org/licenses/by-nc-nd/2.0/fr/
Version intégrale : http://creativecommons.org/licenses/by-nc-nd/2.0/fr/legalcode

Vous êtes libre de :

partager — reproduire, distribuer et communiquer l'oeuvre
Selon les conditions suivantes :

Attribution — Vous devez attribuer l'oeuvre de la manière indiquée par l'auteur de l'oeuvre ou le titulaire des droits (mais pas d'une manière qui suggérerait qu'ils vous soutiennent ou approuvent votre utilisation de l'oeuvre).

Pas d’Utilisation Commerciale — Vous n'avez pas le droit d'utiliser cette oeuvre à des fins commerciales.

Pas de travaux dérivés — Vous n’avez pas le droit de modifier, de transformer ou d’adapter cette œuvre.
comprenant bien que :

Renoncement — N'importe laquelle des conditions ci-dessus peut être waived si vous avez l'autorisation du titulaire de droits.

Domaine public — Là où l'oeuvre ou un quelconque de ses éléments est dans le domaine public selon le droit applicable, ce statut n'est en aucune façon affecté par la licence.

Autres droits — Les droits suivants ne sont en aucune manière affectés par la licence :
Vos prérogatives issues des exceptions et limitations aux droits exclusifs ou fair use;
Les droits moraux de l'auteur;

Droits qu'autrui peut avoir soit sur l'oeuvre elle-même soit sur la façon dont elle est utilisée, comme le droit à l'image ou les droits à la vie privée.

Remarque — A chaque réutilisation ou distribution de cette oeuvre, vous devez faire apparaître clairement au public la licence selon laquelle elle est mise à disposition.

Merci de respecter également les licences originelles des plugins et du pack d'icone intégré.