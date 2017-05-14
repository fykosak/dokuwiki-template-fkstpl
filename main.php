<?php

require_once(dirname(__FILE__) . '/tpl_functions.php'); /* include hook for template functions */
require_once(dirname(__FILE__) . '/Jumbotron-data.php');
global $conf, $ACT, $lang, $ID;
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

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
</head>

<body data-act="<?php echo $ACT; ?>">
<div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>" data-namespace="<?php echo getNS($ID); ?>">

    <?php fksTemplate::printHeader($conf['lang'], $ID); ?>
    <?php $sidebarContent = tpl_include_page(getNS($ID) . ':sidebar_' . $conf['lang'], 0, 0) ?: bootstrapToc(); ?>

    <div class="container">
        <div class="row">
            <!-- <div id="accordion" class="hidden-lg-up col-md-12 col-sm-12" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                           aria-controls="collapseOne">
                            <span class="fa fa-caret-square-o-down"></span>
                        </a>
                    </div>

                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            <?php
            //echo $sidebarContent
            ?>
                        </div>
                    </div>
                </div>
            </div>-->
            <?php global $ACT;
            if ($ACT == 'show' && $sidebarContent) {
                ?>
                <aside class="sidebar col-lg-3 hidden-md-down container-fluid">
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
        Created with <i class="fa fa-heart" aria-hidden="true"></i> by &copy;FYKOS &ndash; <a
            href="mailto:<?php echo tpl_getConf('email_webmaster') ?>"
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
