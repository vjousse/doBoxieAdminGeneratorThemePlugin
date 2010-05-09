<?php
use_helper('I18N');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>

    <!--[if lte IE 7.0]><link rel="stylesheet" type="text/css" href="/doBoxieAdminGeneratorThemePlugin/css/boxie/ie.css" media="screen, projection, tv" /><![endif]-->
    <!--[if IE 8.0]>
            <style type="text/css">
				form.fields fieldset {margin-top: -10px;}
			</style>
		<![endif]-->

    <!-- Adding support for transparent PNGs in IE6: -->
    <!--[if lte IE 6]>
            <script type="text/javascript" src="/doBoxieAdminGeneratorThemePlugin/js/ddpng.js"></script>
            <script type="text/javascript">
				DD_belatedPNG.fix('h3 img');
			</script>
		<![endif]-->
  </head>
  <body id="login">


    <div class="box box-50 altbox">
      <div class="boxin">
        <div class="header">
          <h3><img src="/doBoxieAdminGeneratorThemePlugin/css/boxie/img/logo-login.png" alt="Boxie Admin" /></h3>

          <ul>
            <li><a href="#" class="active">login</a></li><!-- .active for active tab -->
            <li><a href="#">lost password</a></li>          </ul>
        </div>
        <?php echo $sf_content ?>
      </div>
    </div>


    <!--[if IE 6]>
    <script type="text/javascript">
	/*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; }
	var IE6UPDATE_OPTIONS = {
		icons_path: "http://static.ie6update.com/hosted/ie6update/images/",
		message: "Votre version d'Internet Explorer (version 6 de 2001) est trop ancienne pour visualiser ce site. Cliquez ici pour la mettre à jour ...",
		url: "http://www.microsoft.com/france/windows/products/winfamily/ie/ie8/default.aspx"
	}
    </script>
    <script type="text/javascript" src="http://static.ie6update.com/hosted/ie6update/ie6update.js"></script>
    <![endif]-->
  </body>
</html>
