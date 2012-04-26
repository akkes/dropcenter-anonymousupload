<?php


define('DC_TITLE','Drop:kes');//Titre du dropCenter
define('DC_DESCRIPTION','File drop center kiss n\'fun');//description du dropCenter
define('DC_LOGO','');//logo central du dropCenter (Si rien n'est mis, le logo par défaut apparaît)
define('DC_LICENCE','CC BY 3.0');//License de votre dropCenter
define('UPLOAD_FOLDER','uploads/');//chemin vers le dossier d'upload (ne pas oublier de mettre les droits d'écriture sur ce dossier)
define('NAME_LIMIT',25);//Nombre maximal de caractères affichés pour les fichiers
define('NAME_LIMIT_BORDER','..');//Les caractères qui s'afficheront pour signifier qu'un nom est raccourci
define('MAX_SIZE',1000);//Taille maximale authorisée par fichier en Mo (Pensez a configurer post_max_size et upload_max_size dans le fichier php.ini de votre serveur si vous voulez uploader de gros fichiers).
define('FORBIDEN_FORMAT','exe,php,sh,bin,htaccess,htm,html,asp');//Les extensions interdites à l'exécution séparées par des virgules (les fichiers seront bien envoyés mais un .txt sera rajouté à l'extension afin d'empêcher les utilisateurs d'exécuter leurs fichiers sur le serveur
define('AVATAR_DEFAULT','defaultAvatar.png'); //chemin de l'avatar par défaut
define('AVATARFOLDER',UPLOAD_FOLDER.'avatars/'); //dossier contenant les avatars
define('FORTUNE',true);//Affiche une citation aléatoire Chuck Norris Facts (mettre à false pour ne pas afficher)
define('RSS_MAIL','rss@mail.com');
define('READ_FOR_ANONYMOUS',true);// Définit si les visiteurs non authentifiés peuvent lire le contenu du dropCenter (true = lecture possible, false = lecture interdite)
define('UPLOAD_FOR_ANONYMOUS',true);// Définit si les visiteurs non authentifiés peuvent envoyer du contenu vers dropCenter (true = envoit possible, false = envoit interdite)
define('DC_LANG','fr - Francais');//Définit la langue par défaut
define('DIR_LANG','lang/');//Dossier des fichiers de langue
define('MAIL',true);//Autorise les notifications par e-mail
define('DISPLAY_DOTFILES',false);//Affiche ou non les dossiers/fichiers commençant par un point
define('DISPLAY_UPDATE',true);//Activer la vérification des mises-à-jour
define('DISPLAY_AVATAR_FOLDER',false);//Afficher le dossier des avatars

/** A MOINS DE SAVOIR CE QUE VOUS FAITES, NE TOUCHEZ PAS AUX CONFIGURATIONS CI-DESSOUS **/
define('DCFOLDER',UPLOAD_FOLDER.'.dc/'); //fichier contenant les données d'évènements
define('LANGFOLDER','lang/'); //dossier contenant les fichiers données de traductions
define('EVENTFILE','.event.dc'); //fichier contenant les données d'évènements
define('USERFILE','.user.dc.php'); //fichier contenant les données utilisateurs
define('CONFIGFILE','.config.dc.php'); //fichier contenant les données utilisateurs
define('TAGSFILE','.tags.dc'); //fichier contenant les tags des fichiers envoyés
define('CHUCKFILE','.chuck.dc.fortune');//Nom du fichier fortune contenant les citations de Chuck Norris

define('SECURE_DELIMITER_BEGIN','<?php /*'); //
define('SECURE_DELIMITER_END','*/ ?>'); //
define('DC_VERSION','1.4'); //Version du programme
define('DC_NAME','Beta');//Nom du programme
define('DC_VERSION_NUMBER','1.4');//Nom du programme
?>
