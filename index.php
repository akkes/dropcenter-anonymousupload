<?php
session_start();
require_once('php/config.php');
require_once('php/function.php');
$_ = getLang();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo DC_TITLE; ?></title>
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="css/styles.css" />
<link rel="alternate" type="application/rss+xml"href="php/action.php?action=rss" title="<?php t("Flux RSS");?>" />

	
        <!--[if lt IE  9]>
          <script src="js/html5.js"></script>
        <![endif]-->

    </head>
    <body onbeforeunload ="checkPendingTask();">
		<header <?php echo (DC_LOGO!=''?'style="background-image:url(\''.DC_LOGO.'\')"':''); ?>>
		<section id="versionBloc"></section>
		
		<div class="preloader"> Chargement en cours...</div>
		</header>
		<?php 
		if(file_exists('./'.DCFOLDER.USERFILE)){
		$user = (isset($_SESSION['user']) && trim($_SESSION['user'])!='' && $_SESSION['user']!=null ?@unserialize($_SESSION['user']):null);
		$user = ($user?$user:null);
		?>


		<div id="dropbox">
		
		<!--*********************************************-->
		<!-- [ADMINISTRATION] CREATION D'UN UTILISATEURS -->
		<!--*********************************************-->

		<section id="usersBloc">
		<form action="php/action.php?action=addUser" method="POST">
		<h1><?php t("Liste des utilisateurs");?></h1>
		<h2 onclick="$('#userCreateBloc').fadeToggle()">(+ <?php t("Ajouter un utilisateur");?>)</h2>
		<?php 
		if(isset($user) && $user->rank=='admin'){
			$userList = parseUsers('./');
		?><ul>
		<li id="userCreateBloc">
			<ul>
				<li><figure class="avatar"><img src="img/<?php echo AVATAR_DEFAULT; ?>"/></figure></li>
				<li><span><?php t("Login");?>: <input required type="text" placeholder="<?php t("Login");?>" type="text" name="login"/></span></li>
				<li><span><?php t("Password");?>: <input required type="password" placeholder="<?php t("Password");?>" type="password" name="password"/></span></li>
				<li><span><?php t("Rang");?>: <select name="rank"><option value="user"><?php t("Utilisateur");?></option><option value="admin"><?php t("Administrateur");?></option></select></span></li>
				<li><span><?php t("Mail");?>: <input required pattern="[^ @]*@[^ @]*" placeholder="<?php t("Mail");?>" type="text" name="mail"/></span></li>
				<li><input type="submit" value="Ajouter"></li>
			</ul>
		</li>

		<!--*****************************************-->
		<!-- [ADMINISTRATION] LISTE DES UTILISATEURS -->
		<!--*****************************************-->

		<?php
		foreach($userList as $userInfos){
		?>
		<li>
			<ul>
				<li><figure class="avatar" id="avatar"><img src="<?php echo $userInfos->avatar; ?>"/></figure></li>
				<li><span><?php t("Login");?>: <?php echo $userInfos->login; ?></span></li>
				<li><span><?php t("Rang");?>: <?php echo $userInfos->rank; ?></span></li>
				<li><span> <a href="mailto: <?php echo $userInfos->mail; ?>"><?php echo $userInfos->mail; ?></a></span></li>
				<!-- <li><a onclick="editUser('<?php echo $userInfos->login; ?>');">Modifier</a></li> -->
				<li><a href="php/action.php?action=deleteUser&user=<?php echo $userInfos->login; ?>"><?php t("Supprimer");?></a></li>
			</ul>
		</li>
		<?php
		}?>
		
		</ul>
		<?php } ?>
		</form>
		</section>


		<!--***************************-->
		<!-- [PUBLIQUE] IDENTIFICATION -->
		<!--***************************-->

		<div class="loginBloc">
		<?php
		if(!isset($user) || $user==null){ ?>
		<form action="php/action.php?action=login" method="POST">
			<?php t("Login");?> : <input required type="text" placeholder="<?php t("Login");?>" type="text" name="login">
			<?php t("Password");?> : <input required type="password" placeholder="<?php t("Password");?>" type="password" name="password">
			<input type="submit" name="Connect">
		</form>
		<?php 
		}else{
			echo '<figure class="avatar"><img src="'.$user->avatar.'"/></figure><section class="textLogin">'.tt("Connecte en tant que %",array($user->login)).' - <a href="php/action.php?action=logout">'.tt("Deconnexion").'</a></section>';
		} ?>
		</div>

		<!--***************************-->
		<!-- [UTILISATEUR] PREFERENCES -->
		<!--***************************-->
		<?php  if(isset($user)){?>
		<form action="php/action.php?action=saveSettings&user=<?php echo (isset($user)?$user->login:''); ?>" method="POST">
		<section id="paramsBloc">
				<h1><?php t("Parametres");?></h1>	
				<ul>
					<li><?php t('Profil') ;?>
						<ul>
							<li><span><?php t('Password'); ?> : </span><input placeholder="<?php t('Password'); ?>" type="password" name="password"></li>
							<li><span><?php t('Mail'); ?> : </span><input required pattern="[^ @]*@[^ @]*" placeholder="<?php t('Mail'); ?>" value="<?php echo $user->mail; ?>" type="text" name="mail"></li>
							<li><span><?php t('Avatar'); ?> : </span><input placeholder="<?php t('Avatar'); ?>" value="<?php echo $user->avatar; ?>" type="text" name="avatar"></li>
						</ul>
					</li>
					<li><?php t('Preferences') ;?>
						<ul>
							<li><span><?php t('Notification par mail ?'); ?> :</span><input type="checkbox" name="notifMail"<?php if(isset($user->notifMail) && $user->notifMail == "true") { echo 'checked'; }?>> <?php if(isset($user->notifMail) && $user->notifMail == "true") { t('On'); } else { t('Off'); } ?></li>
							<li><span><?php t("Langue");?> :</span>


							<select name="lang">
							  	<?php 
							  	$dir = scandir(DIR_LANG);
							  	foreach ($dir as $file){
							  		
							  		if(is_file(DIR_LANG.$file) && strpos(DIR_LANG.$file, '.')===false){
							  			echo '<option '.($user->lang==$file ? 'selected="selected"':'').'>'.utf8_encode($file).'</option>';
							  		}
							  	}  
							  	?>
							 </select>
							</li>
						</ul>
					</li>
					<li>
						<input type="submit" value="<?php t("Valider");?>">
					</li>
				</ul>
		
		</section>
			</form>

<?php } ?>
		<!--***********************************-->
		<!-- [ADMINISTRATION/UTILISATEUR] MENU -->
		<!--***********************************-->

	<?php if(isset($user) && $user->rank=='admin'){ ?>
<div class="menuBloc">
	<a onclick="addFolder();" class="newFolder tooltips"
		title="<?php t("Nouveau dossier")?>"></a> <a
		onclick="$('#paramsBloc').fadeToggle()" class="preferences tooltips"
		title="<?php t("Parametres") ?>"></a> <a
		onclick="$('#usersBloc').fadeToggle()" class="member tooltips"
		title="<?php t("Comptes")?>"></a> <a
		href="php/action.php?action=backup" class="backup tooltips"
		title="<?php t("Sauvegarde");?>"></a>
</div>

	<?php } ?>
<div class="clear"></div>

		<!--**********************-->
		<!-- [TOUS] FIL D'ARIANNE -->
		<!--**********************-->

<ul class="breadcrumb"></ul>
<div class="clear"></div>

		<!--*********************-->
		<!-- [TOUS] ZONE DE DROP -->
		<!--*********************-->

<span class="message"><?php t("Droppez le fichier ici pour l'uploader. <br /><i>(Enfin tout depend de votre navigateur)</i>");?>
</span>



</div>
	<?php }else{
		?>

		<!--*******************************-->
		<!-- [ADMINISTRATION] INSTALLATION -->
		<!--*******************************-->

<form action="php/action.php?action=addUser" method="POST">
	<section id="initProgram">
		<h1>
		<?php t("Installation du programme");?>
		</h1>
		<p>
		<?php t("Aucun administrateur n'est defini, merci de remplir les informations ci dessous.");


		$tests = array();
		if (!@function_exists('file_get_contents')){
		 $tests['error'][] = tt('La fonction requise "file_get_contents" est inaccessible sur votre serveur, verifiez votre version de PHP.');
		}else{
		 $tests['succes'][] = tt('La fonction requise "file_get_contents" est accessible sur votre serveur');	
		}
		if (!@function_exists('file_put_contents')){
		 $tests['error'][] = tt('La fonction requise "file_put_contents" est inaccessible sur votre serveur, verifiez votre version de PHP.');
		}else{
		 $tests['succes'][] = tt('La fonction requise "file_put_contents" est accessible sur votre serveur');	
		}
		if (@version_compare(PHP_VERSION, '4.3.0') <= 0){
		 $tests['warning'][] = tt('Votre version de PHP (%) est trop ancienne, il est possible que certaines fonctionalitees du script comportent des disfonctionnements.',array(PHP_VERSION));
		}else{
		 $tests['succes'][] = tt('Votre version de PHP (%) est compatible avec le script',array(PHP_VERSION));	
		}
		if(is_writable('../'.UPLOAD_FOLDER)){
			$tests['error'][] = tt('Le dossier de stockage des donnees "%" est inaccessible en ecriture, verifiez que vous avez bien regle les permissions via un chmod777 sur le dossier.',array(UPLOAD_FOLDER));
		}else{
		 $tests['succes'][] = tt('Le dossier de stockage des donnees "%" est accessible en ecriture',array(UPLOAD_FOLDER));	
		}
		?>
		</p>
		<section>
			<ul>

				<?php  if(!isset($tests['error'])){ ?>
				<li><figure class="avatar">
						<img src="img/<?php echo AVATAR_DEFAULT; ?>" />
					</figure></li>
				<li><span><?php t("Login");?>: <input  placeholder="<?php t("Login");?>"required type="text"
						name="login" /> </span></li>
				<li><span><?php t("Password");?>: <input placeholder="<?php t("Password");?>" required type="password"
						name="password" /><input type="hidden" name="rank" value="admin" />
				</span></li>
				<li><span><?php t("Mail");?>: <input placeholder="<?php t("Mail");?>" pattern="[^ @]*@[^ @]*" required
						type="email" name="mail" /> </span></li>
				<li><span> <?php t("Racine du programme")?>: <input pattern="https?://.+"
						required type="url"
						value="<?php echo str_replace('index.php','','http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']); ?>"
						name="root" /> </span></li>
				<li><input type="submit" value="<?php t("Creer");?>"></li>

				<?php } 

				if(count($tests)!=0){
					foreach($tests as $type=>$messages){
						?>

						<li><?php echo $type; ?> : <ul>
						<?php
						foreach($messages as $message){
						?>


						<li class="requireBloc <?php echo $type;?>"><span><?php echo $message; ?> </span></li>

				<?php
					}
					?></ul></li><?php
					}
				}


				?>

			</ul>
		</section>
	</section>
</form>
		<?php } ?>

		<!--***************-->
		<!-- [TOUS] FOOTER -->
		<!--***************-->

<footer>
<?php t("CopyrightFooter",array(DC_TITLE,DC_VERSION,DC_NAME,DC_LICENCE));?>
<?php 

$infoFiles = countFiles();
$fileNumber = count($infoFiles);
$totalSize = 0;

foreach($infoFiles as $file){
	$totalSize += $file['size'];
}
 t('% fichiers disponibles pour un poids total de %',array($fileNumber,convertSize($totalSize))); ?>
	</span><br/><br/>
	<?php echo (FORTUNE?chuckQuote().'<br/><br/>':'') ?>
	<a class="rssFeed tooltips" target="_blank"
		href="php/action.php?action=rss" alt="<?php t("Flux RSS");?>"
		title="<?php t("Abonnez vous au flux rss pour suivre les evenements du DropCenter");?>"><figure></figure><?php t("Flux RSS");?>
	</a>
</footer>


		<!--*******************-->
		<!-- [TOUS] JAVASCRIPT -->
		<!--*******************-->

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.filedrop.min.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/tinypop.min.js"></script>
<span id="scriptRoot" class="hidden"><?php echo getConfig('ROOT'); ?> </span>
<?php if(isset($user) && $user->rank=='admin' && DISPLAY_UPDATE){ ?>
<script type="text/javascript" src="http://dropCenter.fr/wp-content/maj/maj.php"></script>
<?php } ?>

<?php if(isset($_GET['error'])){ ?>
			<script type="text/javascript">  TINYPOP.show("<?php echo $_GET['error'] ?>", {position: 'top-right',timeout: 3000,sticky: false});</script>
<?php } ?>

</body>
</html>

