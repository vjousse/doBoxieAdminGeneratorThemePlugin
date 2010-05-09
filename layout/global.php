<?php use_helper('Date'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>

    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />


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
				DD_belatedPNG.fix('#nav #h-wrap .h-ico');
				DD_belatedPNG.fix('.ico img');
				DD_belatedPNG.fix('.msg p');
				DD_belatedPNG.fix('table.calendar thead th.month a img');
				DD_belatedPNG.fix('table.calendar tbody img');
			</script>
		<![endif]-->
  </head>
  <body>

    <div id="header">
      <div class="inner-container clearfix">
        <h1 id="logo">
          <a class="home" href="#" title="Go to admin's homepage">
						Boxie Admin	<!-- your title -->
            <span class="ir"></span>
          </a><br />
          <a class="button" href="#">visit site&nbsp;»</a>
        </h1>
        <div id="userbox">
          <div class="inner">
            <strong>John Doe</strong>
            <ul class="clearfix">
              <li><a href="#">profile</a></li>
              <li><a href="#">settings</a></li>
            </ul>
          </div>
          <a id="logout" href="#">log out<span class="ir"></span></a>
        </div><!-- #userbox -->
      </div><!-- .inner-container -->
    </div><!-- #header -->

    <div id="nav">
      <div class="inner-container clearfix">
        <div id="h-wrap">
          <div class="inner">
            <h2>
              <span class="h-ico ico-dashboard"><span>Dashboard</span></span>
              <span class="h-arrow"></span>
            </h2>
            <ul class="clearfix">
              <!-- Admin sections - feel free to add/modify your own icons are located in "css/img/h-ico/*" -->
              <li><a class="h-ico ico-edit" href="#"><span>Content</span></a></li>
              <li><a class="h-ico ico-comments" href="#"><span>Comments</span></a></li>
              <li><a class="h-ico ico-media" href="#"><span>Media</span></a></li>
              <li><a class="h-ico ico-syndication" href="#"><span>Syndication</span></a></li>
              <li><a class="h-ico ico-send" href="#"><span>Newsletter</span></a></li>
              <li><a class="h-ico ico-cash" href="#"><span>Affiliate</span></a></li>
              <li><a class="h-ico ico-color" href="#"><span>Appearance</span></a></li>
              <li><a class="h-ico ico-users" href="#"><span>Users</span></a></li>
              <li><a class="h-ico ico-advanced" href="#"><span>Settings</span></a></li>
            </ul>
          </div>
        </div><!-- #h-wrap -->
        <form action="" method="post"><!-- Search form -->
          <fieldset>
            <label class="a-hidden" for="search-q">Search query:</label>
            <input id="search-q" class="text fl" type="text" name="search-q" size="20" value="search&hellip;" />
            <input class="hand fr" type="image" src="/doBoxieAdminGeneratorThemePlugin/css/boxie/img/search-button.png" alt="Search" />
          </fieldset>
        </form>
      </div><!-- .inner-container -->
    </div><!-- #nav -->

    <div id="container">
      <div class="inner-container">

        <?php echo $sf_content ?>

        <div id="footer"><!-- footer, maybe you don't need it -->
          <p>© Vincent Jousse 2010, <a href="http://www.devorigin.fr">Devorigin</a></p>
        </div>

      </div><!-- .inner-container -->
    </div><!-- #container -->

  </body>
</html>