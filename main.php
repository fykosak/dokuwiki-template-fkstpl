<?php

require_once(dirname(__FILE__) . '/tpl_functions.php'); /* include hook for template functions */
require_once(dirname(__FILE__) . '/jumbotron/Jumbotron.php');
require_once(dirname(__FILE__) . '/navBar/BootstrapNavBar.php');
require_once(dirname(__FILE__) . '/navBar/NavBarItem.php');
global $conf, $ACT, $lang, $ID;
$FksTemplate = new fksTemplate\fksTemplate();
$FksTemplate->setLang($conf['lang']);

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
    <meta name="author" content="Michal Červeňák"/>
    <title>
        <?php tpl_pagetitle() ?> :: <?php echo strip_tags($conf['title']) ?>
    </title>
    <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js');
        })(document.documentElement);</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <?php echo tpl_favicon(array('favicon')) ?>
    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
        crossorigin="anonymous"></script>
    <script>window.Tether = window.Tether || {};</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>

    <?php if (tpl_getConf('ga_trackcode')): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo tpl_getConf('ga_trackcode'); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo tpl_getConf('ga_trackcode'); ?>');
    </script>
    <?php endif; ?>

</head>

<body data-act="<?php echo $ACT; ?>"
      data-namespace="<?php echo getNS($ID); ?>"
      data-page_id="<?php echo $ID; ?>"
>
<div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>"
>

    <?php $FksTemplate->printHeader($ID); ?>
    <?php
    $sidebarPage = p_read_metadata($ID)['current']['sidebar'];
    $sidebarContent = null;
    if ($sidebarPage === null) {
        $sidebarContent = tpl_include_page(getNS($ID) . ':sidebar_' . $conf['lang'], 0, 0);
    } elseif ($sidebarPage !== '') {
        $sidebarContent = tpl_include_page($sidebarPage, 0, 0);
    }
    ?>
    <?php ?>

    <div class="container">
        <div class="row">
            <?php
            if ($ACT == 'show' && $sidebarContent) {
                ?>
                <aside class="sidebar col-lg-3 col-md-12 col-sm-12 container-fluid">
                    <?php
                    echo $sidebarContent;
                    ?>
                </aside>
                <?php
            } ?>
            <main id="dokuwiki__content"
                  class="content dokuwiki__content container-fluid <?php echo ($ACT == 'show' &&
                      $sidebarContent) ? 'col-lg-9' : 'col-lg-12'; ?> col-md-12 col-sm-12 col-xs-12"
                  data-spy="scroll"
            >
                <?php
                tpl_flush();
                html_msgarea();
                tpl_content(false);
                tpl_flush();
                ?>
            </main>
            <hr class="col-lg-12 col-md-12 col-sm-12 col-xs-12"/>

            <footer class="dokuwiki_footbar col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php tpl_include_page('footbar_' . $conf['lang'], 1, 1); ?>
                <div class="clearer"></div>
            </footer>
        </div>
    </div>
    <hr/>
    <address class="container">
        Created with &lt;love/&gt; by &copy;FYKOS &ndash; <a
            href="mailto:<?php echo tpl_getConf('email_webmaster') ?>"
            title="Kontaktní email"><?php echo tpl_getConf('email_webmaster') ?></a>
    </address>
</div>
<div class="no">
    <?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?>
</div>
</body>
</html>
<?php
exit();
