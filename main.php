<?php
/**
 * DokuWiki FKS template (based on layout by Jan Prachař <honzik@fykos.cz>)
 *
 * @author   Lukáš Timko <lukast@fykos.cz>
 * @author   Michal Koutný <michal@fykos.cz>
 */
if(!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
@require_once(dirname(__FILE__).'/fks_functions.php');


/*
 * We use translate plugin to retrive information about translations.
 * Primarily language is detected from page metadata.
 * 
 */
$translateHelper = plugin_load('helper','translate');
if($translateHelper){
    $defaultLang = get_default_lang();
    $pageLang = $translateHelper->getPageLanguage(null,$defaultLang);
   
}else{
   
    $pageLang = 'cs';
}

$conf['lang'] = $pageLang;


$isAuthWiki = !empty($_SERVER['REMOTE_USER']);
$isAuthFksweb = isset($_SESSION['id']);
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
      lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
    <head>
        <meta charset="UTF-8" />

        <meta name="keywords" content="fyzika, fyzikální, fyzikalni, FYKOS, seminář, seminar, soutěž, soutez" /> 
        <meta name="category" content="physics" />
        <meta name="robots" content="index,follow" /> 
        <meta name="googlebot" content="index,follow,snippet,archive" />
        <!--TODO AUTHOR self promo - use "crypted" e-mails defeats robotic harvesters /--> 
        <meta name="author" content="FYKOS, programming: Jan Prachař, Michal Koutný, design: Vojtěch Molda" /> 
        <!-- AUTHOR self promo - end /--> 

        <!-- GEOURL /--> 
        <meta name="ICBM" content="50.1152, 14.448" /> 
        <meta name="DC.title" content="FYKOS" />
        <!-- GEOURL - end /-->

        <title>
            <?php tpl_pagetitle() ?> :: <?php echo strip_tags($conf['title']) ?>
        </title>

        <script>(function (H) {
                H.className = H.className.replace(/\bno-js\b/, 'js')
            })(document.documentElement)</script>
        <?php tpl_metaheaders() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <?php echo tpl_favicon(array('favicon')) ?>
        <?php tpl_includeFile('meta.html') ?>
<!--<script src="/lib/tpl/fkstpl/tablesort/jquery.tablesorter.js"></script>-->
        <script src="<?php echo DOKU_TPL; ?>css/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>

    </head>

    <body>
        <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
        <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
          should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
        <div id="dokuwiki__site"><div id="dokuwiki__top" class="site <?php echo tpl_classes(); ?>">
                <div id="page" >            

                    <div class="topbar" >
                        <a class="active" title="<?php echo tpl_getLang('fykos').(($pageLang == "cz") ? '.cz' : '.org') ?>" href="<?php echo wl(); ?>">
                            <div class="home">
                                 <span><?php echo _fks_getFYKOS($pageLang);?></span>
                                
                                <img class="svg" src="<?php echo DOKU_TPL; ?>images/fykos-logo.svg" alt="logo FYKOS.cz"/>
                            </div>
                        </a>
                        <div class="top-image" <?php rnd_background() ?>>

                        </div>
                    </div>

                    <?php
                    _tpl_mainmenu($translateHelper,$pageLang);
                    ?>


                    <!-- ********** CONTENT ********** -->
                    <div id="dokuwiki__content">
                        <div class="pad">
                            <?php tpl_flush() /* flush the output buffer */ ?>
                            <div id="content">
                                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
                                <!-- wikipage start -->
                                <?php tpl_content(false) /* the main content */ ?>
                                <!-- wikipage stop -->
                                <div class="dokuwiki_footbar" >
                                    <?php echo p_render('xhtml',p_get_instructions(io_readFile(DOKU_INC.'data/pages/system/footbar.txt')),$info) ?>
                                </div style="clear:both">  
                            </div><!-- id content -->

                            <?php tpl_flush() ?>                                    
                        </div>
                    </div><!-- /content -->





                </div><!-- id page -->

                <address>
                    &copy;FYKOS &ndash; <a href="mailto:<?php echo tpl_getConf('email_webmaster') ?>" title="Kontaktní email"><?php echo tpl_getConf('email_webmaster') ?></a>
                </address>
            </div></div><!-- /site -->

        <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
        <script type="text/javascript"><!--
        _ga.create('<?php echo tpl_getConf('ga_trackcode'); ?>', '<?php echo $_SERVER['HTTP_HOST']; ?>');
            _gaq.push(['_trackPageview']);
            //--></script>

    </body>
</html>
