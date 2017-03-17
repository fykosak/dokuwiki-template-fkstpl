<?php
/**
 * DokuWiki FKS template (based on layout by Jan Prachař <honzik@fykos.cz>)
 *
 * @author   Lukáš Timko <lukast@fykos.cz>
 * @author   Michal Koutný <michal@fykos.cz>
 * @author   Michal Červeňák <miso@fykos.cz>
 *
 */
if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
require_once(dirname(__FILE__) . '/tpl_functions.php'); /* include hook for template functions */
global $conf, $ACT;
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="<?php echo $conf['lang']; ?>"
      lang="<?php echo $conf['lang']; ?>"
      dir="<?php echo $lang['direction']; ?>"
      class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta name="theme-color" content="#1175da"/>
    <meta name="keywords" content="fyzika, fyzikální, fyzikalni, FYKOS, seminář, seminar, soutěž, soutez"/>
    <meta name="category" content="physics"/>
    <meta name="robots" content="index,follow"/>
    <meta name="googlebot" content="index,follow,snippet,archive"/>
    <meta name="ICBM" content="50.1152, 14.448"/>
    <meta name="DC.title" content="FYKOS"/>
    <title>
        <?php tpl_pagetitle() ?> :: <?php echo strip_tags($conf['title']) ?>
    </title>
    <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js');
        })(document.documentElement);</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <?php echo tpl_favicon(array('favicon')) ?>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>

</head>

<body data-act="<?php echo $ACT; ?>">
<div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>">
    <div class="container-fluid hidden-xs hidden-sm header-image jumbotron" data-background="<?php echo rand(0, 6); ?>">
        <!--  <div class="col-lg-4">FYKOS</div>-->
        <div class="row nav-container">
            <?php
            (new BootstrapNavBar())->mainMenu();
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <aside class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12 container-fluid">
                <?php
                global $ACT;
                if ($ACT == 'show') {
                    tpl_include_page('sidebar', 1, 1);
                }
                ?>
            </aside>

            <main id="dokuwiki__content"
                  class="content dokuwiki__content container-fluid col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <?php
                tpl_flush();
                html_msgarea();
                tpl_breadcrumbs('/');
                tpl_content(false);
                tpl_flush();
                ?>
            </main>


            <footer class="dokuwiki_footbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php tpl_include_page('footbar', 1, 1); ?>
                <div class="clearer"></div>
            </footer>
        </div>


    </div>
    <address class="container">
        &copy;FYKOS &ndash; <a href="mailto:<?php echo tpl_getConf('email_webmaster') ?>"
                               title="Kontaktní email"><?php echo tpl_getConf('email_webmaster') ?></a>
    </address>
</div>
<div class="no">
    <?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?>
</div>
<script type="text/javascript"><!--
    _ga.create('<?php echo tpl_getConf('ga_trackcode'); ?>', '<?php echo $_SERVER['HTTP_HOST']; ?>');
    _gaq.push(['_trackPageview']);
    //-->
</script>
</body>
</html>
<?php
exit();
