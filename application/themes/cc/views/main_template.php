<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title><?php echo $template['title']; ?></title>
  <?php echo theme_css('bootstrap', true); ?>
  <?php echo theme_css('design', true); ?>
  <?php echo theme_css('prettyPhoto', true); ?>
  <?php echo theme_js('jquery', true); ?>
  <?php echo theme_js('jqueryui', true); ?>
  <?php echo theme_js('jquery.prettyPhoto', true); ?>
  <?php echo theme_js('bootstrap', true); ?>
  <?php echo theme_js('global', true); ?>
  <link rel="shortcut icon" href="<?php echo img_url('icone.ico'); ?>" type="image/x-icon" /> 
</head>

<body>
  <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
  <input type="hidden" name="clipid" id="clipid" value="" />
  <div id="container">
    <header></header>
    <div class="header-mobile"><span class="header__icon"></span><span class="header__text">Caribbean Connexion</span></div>
    <?php echo $template['partials']['menu']; ?>
	
    <div id="corps" role="main">
        <?php
          echo $template['partials']['content'];
          echo "<br/> <br/>";
          echo $template['partials']['fb'];
        ?>
    </div>
    <div id="site-cache"></div>
    <?php echo $template['partials']['footer']; ?>
  </div> 
  <!-- end of #container -->
</body>
</html>
