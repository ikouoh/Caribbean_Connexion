<?php
	//session_start();
?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="iso-8859-15">

  <title>Caribbean Connection</title>
  <meta name="description" content="clips officiels de musique caribéenne, tous genres musicaux issus des caraïbes">
  <meta name="author" content="Ibyscus">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="css/design.css">
  <!-- end CSS-->

  <!-- Icone -->
  <link rel="shortcut icon" type="image/x-icon" href="img/icone.ico" />
  
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
  
<?php
	
	include "contents/connection.php";
	include "contents/fonctions.php";
	//passage d'un clip en inactif si signalement d'un probleme avec le lien
	if(isset($_GET['sup'])){
		$sup = mysql_query("UPDATE clips SET `actif` = 0 WHERE idc = '{$_GET['sup']}'") or die(mysql_error());
	}
?>
</head>

<body>

  <div id="container">
    <header>

    </header>
	<div id="menu">
		<div id="Mgauche"><a href="index.php">Accueil</a></div>
		<div><a href="?p=artistes.php">Artistes</a></div>
		<div><a href="?p=genres.php">Genres</a></div>
		<div><a href="?p=iles.php">Iles</a></div>
		<div id="Mdroite"><a href="?p=recherche.php">Recherche</a></div>
	</div>
    <div id="corps" role="main">
<?php
	if(!isset($_GET['p']))
				include "/contents/accueil.php";
	else{
		$fichier = "contents/".$_GET['p'];
		if(preg_match("#^[a-zA-Z0-9]+.[a-z]{3,4}$#", $_GET['p']) AND file_exists($fichier))
			include $fichier;
		else
			include "/contents/404.html";
	}
?>
    </div>
    <footer>
		<p>&copy; Ibyscus 2010-2012, tous droits réservés</p>
    </footer>
  </div> 
  <!-- end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- scripts concatenated and minified via ant build script-->
  <script type="text/javascript" src="js/video.js"></script>
  <!-- end scripts-->
  
</body>
</html>
